<?php
session_start();
if(isset($_SESSION['id'])){
  $userid = $_SESSION['id'];
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
    <link rel="stylesheet" href="Css/wishlist.css?v=<?php echo time(); ?>" />
  
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
  </head>
  <body>
  <?php
    include('./header.php');
?>

      <div class="header-text">
        <h1 class="wishlist-text">My Wishlist</h1>
      </div>

    <!-- Wishlist Box -->
    <?php
     $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    $SQL = "SELECT * FROM WISHLIST_PRODUCT WHERE WISHLIST_ID =(SELECT WISHLIST_ID FROM WISHLIST WHERE FK1_USER_ID = '$userid') ";
    $queery = oci_parse($conn, $SQL);
    oci_execute($queery);

    
         
    echo ' ';
    if($queery){
    for ($i=0; $i<=20 && $value = oci_fetch_array($queery); $i++){
      $wishlist= $value['WISHLIST_ID'];
      $product= $value['PRODUCT_ID'];
      $SQLII = "SELECT * FROM PRODUCT WHERE PRODUCT_ID='$product'";
      $queerrrry = oci_parse($conn,$SQLII);
      oci_execute($queerrrry);
      if($queerrrry){
      for ($j=0; $j<=20 && $values = oci_fetch_array($queerrrry); $j++){
      echo '

   
      <div class="wishlist-container">

      <div class="wishlist-item">
        <div class="wishlist-desc-container">
          <div class="wishlist-img">
          <a href = "product-display-page.php?id=' . $value['PRODUCT_ID'] . '">
           <img src=./Traders/pro-img/'.$values['PRODUCT_IMAGE'].' alt="product-img" height="100px" width="100px"/>
          </div></a>
          <div class="wishlist-desc">
            <div class="wishlist-item-name">
              <h5 class="wishlist-item-text">'.$values['PRODUCT_NAME'].'</h5>
            </div>

            <div class="wishlist-description">
              <p class="wishlist-desc-text">
                '.$values['PRODUCT_DESCRIPTION'].'
              </p>
            </div>
            <div class="wishlist-instock">
              <p class="wishlist-instock-text">In stock</p>
            </div>
           
          </div>
          
        </div>
        <div class="wishlist-priceinfo">
        <a href = "delete-wish.php?id=' . $values['PRODUCT_ID'] .' "<i class="fa-regular fa-heart fa-2x"></i></a>
            <p class="price-info">
                <s>$ 10</s>&nbsp;$5 <br />
                Discount applied : $5
             </p>
          </div>
      </div>
      
    </div>';
      }
    }
    }
  }
    ?>

    <!-- Subscribe Handlebar -->
    <div class="Subscribe-handlebar">

<div class="updates">
    <h6 class="big-text">Dont miss out any updated<br></h6>
    <p class="short-text">Subscribe to Huddersfax mart. Get the
        latest product updates
        and <br>special offers delivered right to your inbox.</p>
</div>
<div class="Email-placeholder">
    <form action="" method="post">
        <input type="email" id="email" name="myGeeks" placeholder="Enter your Email" class="Email-place">
        <button type =  "submit" value="subscribe" name="subscribe" class="btn btn1">Suscribe </button>
        <!-- <a href="#" class="Subscribe-text"> Subscribe</a></button>--> <BR><br> 
    </form>
    <?php
    if (isset($_POST['subscribe'])) {
        $to = $_POST['myGeeks'];
        $subject = 'Connected with Huddersfax';
        $message = "Hello Sir/Mam !\n\nThank you for choosing us. See you again soon.";
        $headers = "From: huddersfaxmart@gmail.com\r\nReply-To: kharelsishir1000@gmail.com";
        $mail_sent = mail($to, $subject, $message, $headers);
        if ($mail_sent == true) {
           
        } else {
            echo "Mail failed";
        }
    }
    ?>
</div>
</div>
    <!-- footer -->
    <?php
    include('./footer.php');
?>
  </body>
</html>
