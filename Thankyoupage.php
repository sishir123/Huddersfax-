<?php
session_start();
if(isset($_SESSION['id'])){
    $userid = $_SESSION['id'];
   
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Huddersfax Mart/ Thankyou</title>

        <!-- Bootstrap -->
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
            crossorigin="anonymous">

        <!-- CSS -->
        <link rel="stylesheet" href="Css/style.css">

        <!-- Bootstrap scripts -->
        <script
            src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
            integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
            crossorigin="anonymous"></script>

        <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link
            href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&family=Ubuntu&display=swap"
            rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
    <body>
    <?php
    include('./header.php');
?>

        <!-- Thanks you msg Section -->

        <div class="thankyou_section">
            <div class="text-1">
                <h1>Thank you</h1>
            </div>
            <div class="text-2">
                <h3>Your order has been completed successfully</h3>
            </div>
            <div class="footer-text">
            <div class="tik-img">
                <img src="images/ticked.png" alt="ticked-img" class="ticked-img">
            </div>
            <div class="text-3">
                <h3>An email receipt, including all details about your order, has been sent to the email address you provided.
                    Please keep it for your records.
                </h3>
            </div>
        </div>
        <div class="homepage-button">
            <a href="Homepage.php" button type="button"  class="btn btn1">Homepage</button></a>
        </div>

        </div>

       

        <!-- Promos -->

        <div class="promos-container">
           
          
            <div class="promos-img">
                <img src="images/promos-img.jpg" alt="promo-img"
                    class="promocode-img">
            
                <img src="images/fresh-fruit-stalls.jpg" alt="shop-now"
                    class="shop-now">
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
    <head>
