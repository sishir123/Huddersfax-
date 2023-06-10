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

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

  <!-- CSS -->
  <link rel="stylesheet" href="Css/cart.css" />
  <link rel="stylesheet" href="Css/style.css" />

  <!-- Bootstrap scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&family=Ubuntu&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link rel="stylesheet" href="./Css/wishlist.css" />
</head>

<body>
  <?php
  include('./header.php');
  ?>


  <div class="cart-page-container">
    <div class="header-text">
      <h1 class="cart-page-text"><b>Checkout</b></h1>
    </div>


    <div class="info-1">
      <div class="profile info">
        <div class="flexing1">
          <i class="fa-solid fa-user fa-beat"></i>

          <?php
          $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
          $SQL = "SELECT * FROM S_USER WHERE USER_ID = $userid";
          $Query = oci_parse($conn, $SQL);
          oci_execute($Query);

          while ($value = oci_fetch_array($Query)) {
            echo '
        <p>' . $value['USER_NAME'] . '</p>';
          }
          ?>
        </div>
      </div>
    </div>
    <br>


    <div class="cart-checkout-container">

      <div class="cart-items-container">
        <?php


        $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
        $SQL = "SELECT * FROM CART_PRODUCT WHERE FK2_CART_ID =(SELECT CART_ID FROM CART WHERE FK1_USER_ID = '$userid' AND STATUS='1') ";
        $queery = oci_parse($conn, $SQL);
        oci_execute($queery);
        $totalprice = array();
        $totalQantity = array();
        if ($queery) {
          for ($i = 0; $i <= 20 && $value = oci_fetch_array($queery); $i++) {
            $cart = $value['FK2_CART_ID'];
            $product = $value['FK1_PRODUCT_ID'];
            $SQLII = "SELECT * FROM PRODUCT WHERE PRODUCT_ID='$product'";
            $queerrrry = oci_parse($conn, $SQLII);
            oci_execute($queerrrry);
            if ($queerrrry) {
              for ($j = 0; $j <= 20 && $values = oci_fetch_array($queerrrry); $j++) {
                $pricetotalquantity = $values['PRICE'] * $value['CART_QUANTITY'];
                $quantity = $value['CART_QUANTITY'];
                array_push($totalQantity, $quantity);
                array_push($totalprice, $pricetotalquantity);
                echo '
      
           <div class="cart-page-item">
             <div class="cart-page-desc-container">
               <div class="cart-page-img">
               <a href = "product-display-page.php?id=' . $values['PRODUCT_ID'] . '">
                 <img src=./Traders/pro-img/' . $values['PRODUCT_IMAGE'] . ' alt="product-img" />
               </div></a>
               <div class="cart-page-desc">
                 <div class="cart-page-item-name">
                   <h5 class="cart-page-item-text">' . $values['PRODUCT_NAME'] . '</h5>
                 </div>

                 <div class="cart-page-description">
                   <p class="cart-page-desc-text">
                    ' . $values['PRODUCT_DESCRIPTION'] . '
                   </p>
                 </div>
                 <div class="cart-page-instock">
                   <p class="cart-page-instock-text">In stock</p>
                 </div>
                 <div class="wrapper">
                   ' . $value['CART_QUANTITY'] . '
                 </div>
               </div>
             </div>
             <div class="cart-page-priceinfo">
               <a href = "delete-cart.php?id=' . $values['PRODUCT_ID'] . ' "<i class="fa-solid fa-trash"></i></a>
               <p class="price-info">
                 &nbsp;$' . $pricetotalquantity . ' <br />
                 
               </p>
             
               </div>
   
          </div>';
              }
            }
          }
        }
        $price = array_sum($totalprice);
        $quantitytotals = array_sum($totalQantity);
        ?>

        <div class="cart-bottom-container">
          <div class="flex">
            <h3><b>Safe & easy shopping</h3></b><br>
          </div><br>
          <div class="flex">
            <h5><i class="fa-solid fa-truck"></i> Pick-up Date And Time</h5>
            <i class="fa-solid fa-chevron-down"></i></p><br>
          </div>

          <!-- Collection slot -->
          <!-- For Day -->
          <?php
          $dates = 0;
          $days = 0;
          $timeslot = 0;
          if (isset($_POST['submit'])) {
            $dates = $_POST['date'];
            $days = $_POST['Day'];
            $timeslot = $_POST['Timeslot'];
            $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
            $SQLI11 = "INSERT INTO COLLECTION_SLOT(COLLECTION_DATE,COLLECTION_DAY,COLLECTION_TIME) VALUES('$dates','$days','$timeslot')";
            $qqery = oci_parse($conn, $SQLI11);
            oci_execute($qqery);
            if ($qqery) {
              $Sqlllli = "SELECT * FROM COLLECTION_SLOT WHERE COLLECTION_DATE = '$dates' AND  COLLECTION_DAY = '$days' AND COLLECTION_TIME = '$timeslot'";
              $QORY = oci_parse($conn, $Sqlllli);
              oci_execute($QORY);
              if ($QORY) {

                $collectionid = oci_fetch_array($QORY);

                if ($collectionid['COLLECTION_DATE'] == $dates && $collectionid['COLLECTION_DAY'] == $days && $collectionid['COLLECTION_TIME'] == $timeslot) {

                  $collid = $collectionid['COLLECTION_ID'];
                  echo $collid;
                  $_SESSION['collid'] = $collid;
                }
              }
            }
          }
          $_SESSION['dates'] = $dates;
          $_SESSION['days2'] = $days;
          $_SESSION['timeslot2'] = $timeslot;
          echo $_SESSION['dates'];




          ?>

          <form method="post">
            <p> Day</p>
            <label for="">Wed</label> <input type="radio" id="Wed" name="Day" value="Wed">
            <label for="">thur</label> <input type="radio" id="Thur" name="Day" value="Thur">
            <label for="">Fri</label> <input type="radio" id="Fri" name="Day" value="Fri">


            <br>
            <br>
            <!-- For Date -->

            <label for="Date">Choose the Date:</label>
            <input type="date" id="date1" name="date">

            <!-- For time -->

            <p>Time Slot</p>
            <input type="radio" id="10am - 1pm" name="Timeslot" value="10am - 1pm">
            <label for="10am - 1pm">10am - 1pm</label><br>
            <input type="radio" id="1pm - 4pm" name="Timeslot" value="1pm - 4pm">
            <label for="1pm - 4pm">1pm - 4pm</label><br>
            <input type="radio" id="4pm - 7pm" name="Timeslot" value="4pm - 7pm">
            <label for="4pm - pm">4pm - 7pm</label><br>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>

        </form>

          <br>
          <br>
          <p>By Clicking Continue,"I confirm that I am aware and accept that <br>I am obiliged
            to pay for my order.I accept the terms and conditions<br> and conditions and confirm that I have read the Privacy policy.
          </p>

      </div>
      <div class="checkout-container">
        <h5>Summary</h5>
        <div class="summary-info">
          <div class="items-in-cart">
            <p>Total price </p>
            <?php
            $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
            $SQL = "SELECT * FROM CART_PRODUCT WHERE FK2_CART_ID =(SELECT CART_ID FROM CART WHERE FK1_USER_ID = '$userid' AND STATUs='1') ";
            $queery = oci_parse($conn, $SQL);
            oci_execute($queery);
            ?>
            <p><?php echo '$ ' . $price; ?></p>
          </div>
          <div class="discount-in-cart">
            <?php
            $offersdisocunt = 0;
            ?>
          </div>
          <div class="price-info">
            <p>Total</p>
            <p><?php
                $Total = $price - $offersdisocunt;
                echo '$ ' . $Total;
                $_SESSION['totalamount']=$Total;
                ?></p>
          </div>
          <?php
          if (isset($_POST['submit'])) {
          $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
          $SQLiiii = "INSERT INTO ORDER_ITEM(ORDER_QUANTITY,ORDER_AMOUNT,FK1_CART_ID,FK2_COLLECTION_ID) VALUES('$quantity','$Total','$cart','$collid')";
          $qqqqqery = oci_parse($conn, $SQLiiii);
            oci_execute($qqqqqery);
          }

          ?>
          <form class="paypal" action="./Paypal/payment.php" method="post" id="paypal_form">
            <input type="hidden" name="cmd" value="_xclick" />
            <input type="hidden" name="amount" value="<?php echo $Total; ?>" />
            <input type="hidden" name="no_note" value="1" />
            <input type="hidden" name="lc" value="UK" />
            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
            <input type="hidden" name="first_name" value="Customer's First Name" />
            <input type="hidden" name="last_name" value="Customer's Last Name" />
            <input type="hidden" name="payer_email" value="customer@example.com" />
            <input type="hidden" name="item_number" value="123456" />
            <input class="btn btn1" type="submit" name="submit" value="Buy Now" />
          </form>

          <!-- <form action="" method="post">
          <button class="btn btn1" name="buynow">Buy Now</button>
          </form> -->
         
        </div>
      </div>
    </div>
  </div>

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