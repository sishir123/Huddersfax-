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
  
  function offerCount($prdoID){
    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    $SQL = "SELECT * FROM OFFER WHERE PRODUCT_ID = $prdoID";
    $queery = oci_parse($conn, $SQL);
    oci_execute($queery);
    $count = oci_fetch_all($queery ,$result);
    $percentage = $result['OFFER_PERCENTAGE'];
    return [$count,$percentage];
  }
  $product = $_GET['id'];
  $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
  $SQL = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = $product";
  $queery = oci_parse($conn, $SQL);
  oci_execute($queery);
  
  echo '<div class="product-display-whole-container">';
  if ($value = oci_fetch_array($queery)) {
    ?>

      <div class="product-display-container">
        <div class="product-display-img-container">
        <img src='./Traders/pro-img/<?php echo $value['PRODUCT_IMAGE'];?>' alt="Img" style="width:100%">
          <div class="review-rating">
            <h3>Reviews and Rating</h3>
          </div>
        </div>
        <div class="product-description">
          <div class="product-item-name">
            <p>
              <strong><?php echo $value['PRODUCT_NAME'];?>' </strong>
            </p>
          </div>
          
          <div class="product-item-desc">
          <?php echo $value['PRODUCT_DESCRIPTION']; ?>
          </div>
          <div class="product-item-price">
            $ <?php 
            $offerData = offerCount($product);

            
            if($offerData[0] > 0){
              $price = $value['PRICE'];
              $finalPrice = $price - (($offerData[1][0]/100)*$price);
              print_r($finalPrice); 
              echo "&nbsp;&nbsp;&nbsp;<s>$price</s>";
              
           
            }else{
              echo $value['PRICE'];
            }
            ?>  &nbsp;
            
          </div>
          <div class="offer-price">
          </div>

          <div class="product-rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <div class="product-stock-checker">Stock available : <?php echo $value['PRODUCT_STOCK']; ?></div>
          <div class="product-add-to-cart">
            <a href = "./cart.php?id=<?php echo $value['PRODUCT_ID']; ?>"> <button class="btn btn1">Add to cart</button></a>
          <div class="flex-horizontal">
            <p>Available</p>
            <p>Within 3-4 days</p>
          </div>
          <div class="product-features">
          <?php echo $value['ALLERGY_INFO']; ?><br />
          </div>
          
        </div>
        
      </div>

      <?php
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
    $SQLIIII = oci_parse($conn, $SQLI);
    echo oci_execute($SQLIIII);

    while ($value = oci_fetch_array($SQLIIII)) {
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
      



  <!-- Reviews Code -->
  <div class="container">
   
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
      </div>



 
</body>

</html>