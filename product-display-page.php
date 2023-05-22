<?php
session_start();
if (isset($_SESSION['id'])) {
  $userid = $_SESSION['id'];
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Huddersfax Mart</title>

  <!-- Azax -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

  <!-- Csslink -->
  <link rel="stylesheet" href="./Css/style.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" href="./Css/Product-display.css?v=<?php echo time(); ?>" />

  <!-- Bootstrap scripts -->

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&family=Ubuntu&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body>
  <?php
  include('./header.php');
  ?>

  <!-- Product-display-container -->

  <?php
  $product = $_GET['id'];
  $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
  $SQL = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = $product";
  $queery = oci_parse($conn, $SQL);
  oci_execute($queery);
  echo '<div class="product-display-whole-container">';
  if ($value = oci_fetch_array($queery)) {
    echo '

      <div class="product-display-container">
        <div class="product-display-img-container">
        <img src=./Traders/pro-img/' . $value['PRODUCT_IMAGE'] . ' alt="Img" style="width:100%">
          <div class="review-rating">
            <h3>Reviews and Rating</h3>
          </div>
        </div>
        <div class="product-description">
          <div class="product-item-name">
            <p>
              <strong>' . $value['PRODUCT_NAME'] . ' </strong>
            </p>
          </div>
          <div class="product-item-desc">
          ' . $value['PRODUCT_DESCRIPTION'] . '
          </div>
          <div class="product-item-price">
            $5 &nbsp; &nbsp;<s> ' . $value['PRICE'] . ' </s> &nbsp; -50%
          </div>
          <div class="product-rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <div class="product-stock-checker">Stock available : 10</div>
          <div class="product-add-to-cart">
            <a href = "./cart.php?id=' . $value['PRODUCT_ID'] . '"><i class="fa-solid fa-cart-shopping">Add to cart</i></a>
            
          </div>
          <div class="flex-horizontal">
            <p>Available</p>
            <p>Within 3-4 days</p>
          </div>
          <div class="product-features">
          ' . $value['ALLERGY_INFO'] . '<br />
          </div>
        
        </div>
      </div>
      ';
  }
  echo '</div>';
  ?>


  <table class="table table-hover">
    <tr>
      <th>Profile</th>
      <th>Username</th>
      <th>Reviews</th>
      <th>Rating</th>
    </tr>


    <!-- Reviews And Rating View -->
    <?php
    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    $SQLI = "SELECT * FROM REVIEW JOIN S_USER ON REVIEW.FK2_USER_ID = S_USER.USER_ID WHERE REVIEW.FK1_PRODUCT_ID = '$product'";
    $SQL = oci_parse($conn, $SQLI);
    echo oci_execute($SQL);

    while ($value = oci_fetch_array($SQL)) {


    ?>
      <tr>
        <td><img src="./userimage/<?php echo  $value['USER_IMAGE']; ?>" alt="" height="100px" width="100px"></td>
        <td> <?php echo $value['USER_NAME']; ?> </td>
        <td> <?php echo $value['REVIEW_FEEDBACK']; ?> </td>
        <td> <?php echo $value['REVIEW_RATING']; ?> </td>

      </tr>
    <?php


    }

    ?>
  </table>
  <!-- <img src="./userimage/" alt=""> -->


  <!-- Reviews Code -->
  <div class="container">
    <!-- <div class="post">
      <div class="text">Thanks for rating us!</div>
      <div class="edit">EDIT</div>
    </div> -->
    <form action="./try.php" method="POST">
      <input type="hidden" name="productid" value="<?php echo
                                                    $_GET['id'];
                                                    ?>">
      <div class="star-widget">
        <input type="radio" name="rate" id="rate-5" value="5">
        <label for="rate-5" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-4" value="4">
        <label for="rate-4" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-3" value="3">
        <label for="rate-3" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-2" value="2">
        <label for="rate-2" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-1" value="1">
        <label for="rate-1" class="fas fa-star"></label>
        <header></header>
        <div class="textarea">
          <textarea cols="30" placeholder="Describe your experience.." name="review"></textarea>
        </div>
        <div class="btn">
          <!-- <input type="submit" value="post" name="Submit"> -->
          <button type="submit" name="Submit-rate">Post</button>
        </div>
      </div>
    </form>
  </div>


  <script>
    const btn = document.querySelector("button");
    const post = document.querySelector(".post");
    const widget = document.querySelector(".star-widget");
    const editBtn = document.querySelector(".edit");
    btn.onclick = () => {
      widget.style.display = "none";
      post.style.display = "block";
      editBtn.onclick = () => {
        widget.style.display = "block";
        post.style.display = "none";
      }
      return false;
    }
  </script>







  <!-- Subscribe Handlebar -->

  <div class="Subscribe-handlebar">
    <div class="updates">
      <h6 class="big-text">Dont miss out any updated<br /></h6>
      <p class="short-text">
        Subscribe to Huddersfax mart. Get the latest product updates and
        <br />special offers delivered right to your inbox.
      </p>
    </div>
    <div class="Email-placeholder">
      <input type="email" id="email" name="myGeeks" placeholder="Enter your Email" class="Email-place" />
      <a href="#" class="Subscribe-text"> Subscribe</a>
      <br /><br />
    </div>
  </div>

  <!-- footer -->
  <div class="footer-container">
    <div class="Contact-row">
      <div class="Needhelp-text">Need Help?</div>
      <div class="middle">
        <a href="Contact-us-page.php"><button class="btn btn1">Contact Us</button></a>
      </div>
    </div>

    <div class="Links">
      <ol>
        <li><a href="Homepage.php" class="links-btn">Home</a></li>
        <li><a href="#" class="links-btn">Bakery</a></li>
        <li><a href="#" class="links-btn">Butchers</a></li>
        <li><a href="#" class="links-btn">Greengrocer</a></li>
        <li><a href="#" class="links-btn">Fishmonger</a></li>
        <li><a href="#" class="links-btn">Delicatessen</a></li>
      </ol>
    </div>

    <div class="policies Links">
      <ol>
        <li><a href="#" class="links-btn">Refund Policy</a></li>
        <li><a href="#" class="links-btn">Return Policy</a></li>
        <li><a href="#" class="links-btn">Payments</a></li>
      </ol>
    </div>
    <div class="Huddersfax-mart Links">
      <ol>
        <li><a href="#" class="links-btn">About us</a></li>
        <li><a href="#" class="links-btn">Terms of Service</a></li>
        <li><a href="#" class="links-btn">Privacy policy</a></li>
      </ol>
    </div>
    <div class="map">
      <p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7891502642515!2d-1.7842727793207414!3d53.64438949499016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487962132bcdb7bb%3A0x653c3a498c896a17!2sHuddersfield%2C%20UK!5e0!3m2!1sen!2snp!4v1681277576705!5m2!1sen!2snp" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="hudder-map"></iframe>
      </p>
    </div>
  </div>
</body>

</html>