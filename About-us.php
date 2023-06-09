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
    <link rel="stylesheet" href="Css/about-us.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="Css/style.css?v=<?php echo time(); ?>" />

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
    <?php
    include('./header.php');
?>


    <!-- Container of about us -->

    <div class="about-us-container">
    <img src="images/team9.jpg" class="image" />
    <p class="firstP">
      Welcome to Huddersfax Mart, your neighborhood grocery store! Our store
      offers a wide variety of fresh produce, meats, dairy, bakery items, and
      household essentials at affordable prices. At Huddersfax Mart, we believe
      in providing our customers with the best possible shopping experience. We
      pride ourselves on our friendly and knowledgeable staff, who are always
      available to answer any questions and offer suggestions. Our store is
      clean, organized, and stocked with the freshest ingredients available. We
      are committed to supporting local farmers and businesses, and we source
      many of our products from nearby producers. This not only helps to reduce
      our carbon footprint but also ensures that our customers receive the
      freshest, highest quality products possible.

      <br />
    </p>

    <h2>Who are we?</h2>
    <p class="secondP">
      At Huddersfax Mart, we are more than just a grocery store. We are a team
      of passionate individuals who are committed to providing our customers
      with the best possible shopping experience. Our store was founded in 1985
      by John and Mary Smith, who saw a need for a local, community-focused
      grocery store in the Huddersfax area. Since then, we have grown and
      expanded, but our commitment to our customers and our community remains
      the same.
    </p>

    <p>
      <br />
    </p>

    <h2>Our mission</h2>
    <p class="secondP">
      At Huddersfax Mart, our mission is to provide our customers with
      high-quality, affordable groceries while also supporting our local
      community. We are committed to sourcing the freshest ingredients from
      local farmers and businesses, reducing our carbon footprint, and giving
      back to those in need. We believe that everyone deserves access to fresh,
      healthy food, and we strive to make this a reality for our customers. We
      are also dedicated to creating a welcoming, friendly environment for our
      customers, where they can shop with confidence and ease. Our team of
      knowledgeable employees is always available to answer questions and offer
      suggestions, and we are committed to providing excellent customer service.
      At Huddersfax Mart, we believe in doing business the right way – with
      integrity, honesty, and respect for our customers and our community. We
      are proud to be a part of the Huddersfax community and are committed to
      making a positive impact in the lives of our customers and neighbors.
    </p>

    <p>
      <br />
    </p>

    <h2>How to contact us?</h2>
    <p class="firstP">
      If you have any questions or would like to learn mote about what we do,
      please don't hesitate to contact us. You can reach us by email at
      info@huddersfax.com, or by phone at (123)456-7890.
      <br /><br />
      We would love to hear from you and discuss how we can help to serve
      you.Thank you for choosing Huddersfax Mart, and we look forward to
      continuing to serve our community with high-quality, affordable groceries
      and exceptional customer service.

     
    </p>
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
