<?php
session_start();
if(isset($_SESSION['id'])){
  $userid = $_SESSION['id'];
 
}else{
  $userid=0;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Huddersfax Mart</title>

    <!-- Bootstrap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />

    <!-- CSS -->
    <link rel="stylesheet" href="Css/cart.css?v=<?php echo time(); ?>" />
    <link href="Css/style.css?v=<?php echo time(); ?>" rel="stylesheet"/>

    <!-- Bootstrap scripts -->
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
      integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
      crossorigin="anonymous"
    ></script>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&family=Ubuntu&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <link rel="stylesheet" href="./Css/wishlist.css" />
  </head>
  <body>
    <!-- Include Header -->
  <?php
    include('./header.php');
  ?>

    <div class="cart-page-container">
      <div class="header-text">
        <h1 class="cart-page-text">Cart</h1>
        <p>Promo codes are confirmed at checkout.</p>
      </div>
      <div class="cart-checkout-container">
      <div class="cart-items-container">

      <?php
   
  
    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    $SQL = "SELECT * FROM CART_PRODUCT WHERE FK2_CART_ID =(SELECT CART_ID FROM CART WHERE FK1_USER_ID = '$userid') ";
    $queery = oci_parse($conn, $SQL);
    oci_execute($queery);

    
         
    echo ' ';
    if($queery){
    for ($i=0; $i<=20 && $value = oci_fetch_array($queery); $i++){
      $cart= $value['FK2_CART_ID'];
      $product= $value['FK1_PRODUCT_ID'];
      $SQLII = "SELECT * FROM PRODUCT WHERE PRODUCT_ID='$product'";
      $queerrrry = oci_parse($conn,$SQLII);
      oci_execute($queerrrry);
      if($queerrrry){
      for ($j=0; $j<=20 && $values = oci_fetch_array($queerrrry); $j++){
      echo '
       
            <div class="cart-page-item">
              <div class="cart-page-desc-container">
                <div class="cart-page-img">
                <a href = "product-display-page.php?id=' . $values['PRODUCT_ID'] . '">
                  <img src=./Traders/pro-img/'.$values['PRODUCT_IMAGE'].' alt="product-img" />
                </div></a>
                <div class="cart-page-desc">
                  <div class="cart-page-item-name">
                    <h5 class="cart-page-item-text">'.$values['PRODUCT_NAME'].'</h5>
                  </div>

                  <div class="cart-page-description">
                    <p class="cart-page-desc-text">
                     '.$values['PRODUCT_DESCRIPTION'].'
                    </p>
                  </div>
                  <div class="cart-page-instock">
                    <p class="cart-page-instock-text">In stock</p>
                  </div>
                  <div class="wrapper">
                    <input
                      type="number"
                      min="0"
                      max="100"
                      class="num"
                      value="1"
                    />
                  </div>
                </div>
              </div>
              <div class="cart-page-priceinfo">
                <a href = "delete-cart.php?id=' . $values['PRODUCT_ID'] .' "<i class="fa-solid fa-trash"></i></a>
                <p class="price-info">
                  <s>$ 10</s>&nbsp;$5 <br />
                  Discount applied : $5
                </p>
              
                </div>
    
           </div>';
      }
    }
  }
  }
  ?>
  <div class="checkout-container">
          <h5>Summary</h5>
          <div class="summary-info">
            <div class="items-in-cart">
              <p>Price </p>

      <?php      
    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    $SQL = "SELECT * FROM CART_PRODUCT WHERE FK2_CART_ID =(SELECT CART_ID FROM CART WHERE FK1_USER_ID = '$userid') ";
    $queery = oci_parse($conn, $SQL);
    oci_execute($queery);
    ?>

          
              <p>$ 20</p>
            </div>
            <div class="discount-in-cart">
              <p>Discount Applied</p>
              <p>$ -10</p>
            </div>
            <div class="price-info">
              <p>Total</p>
              <p>$ 10</p>
            </div>
            <a href="./checkout-page.php">
            <button class="btn btn1">Checkout</button></a>
          </div>
      
          </div>


          <div class="cart-bottom-container">
            <div class="flex">
              <h3>Safe & easy shopping</h3>
            </div>
            <div class="flex">
              <p>
                <i class="fa-solid fa-rotate-right"></i> Free returns for 30
                days
              </p>
              <p><i class="fa-solid fa-chevron-right"></i></p>
            </div>
            <div class="flex">
              <p>
                <i class="fa-regular fa-credit-card"></i> Convenient payment
                method
              </p>
              <p><i class="fa-solid fa-chevron-right"></i></p>
            </div>
            <div class="flex">
              <p><i class="fa-solid fa-truck"></i> Pick-up point</p>
              <p><i class="fa-solid fa-chevron-right"></i></p>
            </div>
          </div>
        </div>
        
       
      </div>
    
  
  
     </div>
    

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
        <input
          type="email"
          id="email"
          name="myGeeks"
          placeholder="Enter your Email"
          class="Email-place"
        />
        <a href="#" class="Subscribe-text"> Subscribe</a> <br /><br />
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
          <li><a href="About-us.php" class="links-btn">About us</a></li>
          <li><a href="#" class="links-btn">Terms of Service</a></li>
          <li><a href="#" class="links-btn">Privacy policy</a></li>
        </ol>
      </div>
      <div class="map">
        <p>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7891502642515!2d-1.7842727793207414!3d53.64438949499016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487962132bcdb7bb%3A0x653c3a498c896a17!2sHuddersfield%2C%20UK!5e0!3m2!1sen!2snp!4v1681277576705!5m2!1sen!2snp"
            width="600"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            class="hudder-map"
          ></iframe>
        </p>
      </div>
    </div>
  </body>
</html>
