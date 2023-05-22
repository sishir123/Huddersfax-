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
    <title>Huddersfax Mart</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- CSS -->
    <link href="Css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />


    <!-- Bootstrap scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&family=Ubuntu&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>
<?php
    include('./header.php');
?>
    <!-- Banners -->
    <div class="Banner">
        <img src="images/Banner-img2.png" alt="image">
    </div>

    <!-- Text -->
    <div class="About-products">
        <div class="heading-text">
            <h1>Our Best Selling Products</h1>
        </div>
        <div class="down-text">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Eius sunt magni est nulla cum eum consequuntur cupiditate
                molestias nemo esse dolore ullam odio itaque illo, maiores
                suscipit nobis reiciendis, consequatur accusamus commodi?
                Minima molestiae qui autem quis, enim eos doloremque libero
                blanditiis debitis labore nesciunt ab, ipsam facilis,
                tempore nihil!</p>
        </div>
    </div>

    <!-- Promos -->

    <div class="promos-container">


        <div class="promos-img">
            <img src="images/promos-img.jpg" alt="promo-img" class="promocode-img">

            <img src="images/fresh-fruit-stalls.jpg" alt="shop-now" class="shop-now">
        </div>


    </div>

    <!-- Featured Products -->

    <p class="featured-text">Featured</p>
    <?php
    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    $SQL = "SELECT * FROM PRODUCT JOIN SHOP ON PRODUCT.FK1_SHOP_ID = SHOP.SHOP_ID WHERE ROWNUM <= 4";
    $queery = oci_parse($conn, $SQL); //Check whether shop is there or not
    oci_execute($queery);
    
    echo '<div class="featured-products">';
    while ($value = oci_fetch_array($queery)){
       
   

echo '

            <div class="card">
            <a href = "product-display-page.php?id='. $value['PRODUCT_ID'] .'">
            <img src=./Traders/pro-img/'.$value['PRODUCT_IMAGE'].' alt="Img" style="width:100%"></a>
                <div class="in-stock flex-verticle">
                    <h6><B>'.$value['SHOP_NAME'].'</B></h6>
                    <p class="instock-text"> In Stock </p>
                </div>
                <h6>'.$value['PRODUCT_NAME'].'</h6>
                <p class="price">$Price : '.$value['PRICE'].' &nbsp;&nbsp;&nbsp;<S>$3.30</S></p>
                <p>'.$value['PRODUCT_DESCRIPTION'].'</p>
                <div class="flex-verticle">
                <a href = "cart.php?id='.$value['PRODUCT_ID'].'"> <button class="btn btn1">Add to cart</button></a>
                    <p class="addtocart-icon"> <a href= "wish.php?id='.$value['PRODUCT_ID'].'"><i class="fa-regular fa-heart black"></i></a></p>
                </div>
            </div>
        
        ';
      }
      echo '</div>';

        ?>
       

    <!-- Category Highlight -->
    <p class="featured-text">Category Highlight</p>

    <div class="Category-highlight">
        <div class="category-title">
            <ol>
                <li><a href="./Category-display-page.php">All products</a></li>
                <li><a href="#">Bakery</a></li>
                <li><a href="#">Butchers</a></li>
                <li><a href="#">Green Grocer</a></li>
                <li><a href="#">Fish Monger</a></li>
                <li><a href="#">Delicatessen</a></li>
            </ol>
        </div>
    </div>

    <!-- Category-product -->


    <?php
    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    $SQL = "SELECT * FROM PRODUCT JOIN SHOP ON PRODUCT.FK1_SHOP_ID = SHOP.SHOP_ID";
    $queery = oci_parse($conn, $SQL);
    oci_execute($queery);
    echo '<div class="featured-products">';
    while ($value = oci_fetch_array($queery)){
    echo '<div class="card">
    <a href = "product-display-page.php?id='. $value['PRODUCT_ID'] .'">
    <img src=./Traders/pro-img/'.$value['PRODUCT_IMAGE'].' alt="Img" style="width:100%"></a>
                <div class="in-stock flex-verticle">
                    <h6><B>'.$value['SHOP_NAME'].'</B> </h6>
                    <p class="instock-text"> In Stock </p>
                </div>
                <h6>'.$value['PRODUCT_NAME'].'</h6>
                <p class="price">$Price : '.$value['PRICE'].' &nbsp;&nbsp;&nbsp;<S>$3.30</S></p>
                <p>'.$value['PRODUCT_DESCRIPTION'].'</p>
                <div class="flex-verticle">
                <a href = "cart.php?id='.$value['PRODUCT_ID'].'"> <button class="btn btn1">Add to cart</button></a>
                 <p class="addtocart-icon">
                 <a href= "wish.php?id='.$value['PRODUCT_ID'].'"><i class="fa-regular fa-heart black"></i></a></p>
             </div>
            </div>
        
        ';
      }
      echo '</div>';

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
                <input type =  "submit" value="subscribe" name="subscribe">
                <!-- <a href="#" class="Subscribe-text"> Subscribe</a></button>--> <BR><br> 
            </form>
            <?php
            if (isset($_POST['subscribe'])) {
                $to = $_POST['myGeeks'];
                $subject = 'Huddersfax Verification';
                $message = "Hello Sir/Mam !\n\nThank you for choosing us. See you again soon.";
                $headers = "From: huddersfaxmart@gmail.com\r\nReply-To: kharelsishir1000@gmail.com";
                $mail_sent = mail($to, $subject, $message, $headers);
                if ($mail_sent == true) {
                    echo "Mail Sent";
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

</html>