<?php
session_start();
if (isset($_SESSION['id'])) {
    $userid = $_SESSION['id'];
}
if(isset($_GET['categoryName'])){
    $na= $_GET['categoryName'];
    
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
    <!-- <link rel="stylesheet" href="Css/style.css"> -->
    <link href="Css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Css/Category-display.css">

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

    <!-- Category selector -->
    <!-- <div class="containe-category">
        <div class="bakery">
            <button class="btn btn1 bls">Bakery</button>
        </div>
        <div class="Fishmonger">
            <button class="btn btn1 bls">Fishmonger</button>
        </div>
        <div class="Butcher">
            <button class="btn btn1 bls">Butcher</button>
        </div>
        <div class="Delicatessen">
            <button class="btn btn1 bls">Delicatessen</button>
        </div>
        <div class="Green Grocer">
            <button class="btn btn1 bls">Green Grocer</button>
        </div>
    </div>
    -->



<!-- Sorting and Searchng -->
    <div class="sort">
        <p class="featured-text ls-1">Category Highlight</p>
        <!-- Default dropright button -->
<div class="btn-group dropright">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    Alphabetically
  </button>
  <div class="dropdown-menu">
  <form method="post">
    <input type="submit" name="a-z" value="A - Z">
    <input type="submit" name="z-a" value="Z - A">
  </form>
  </div>
</div>

<div class="btn-group dropright">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
   Price
  </button>
  <div class="dropdown-menu">
  <form method="post">
    <input type="submit" name="pricehigh" value="High to Low">
    <input type="submit" name="pricelow" value="Low to High">
  </form>
  </div>

</div>
    </div>





    <!-- For Searching-->
    <?php
    if (isset($_POST['search'])) {
        $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
        if(isset($_POST['text'])){
        $text = $_POST['text'];
        $SQL11 = "SELECT * FROM PRODUCT JOIN SHOP ON PRODUCT.FK1_SHOP_ID = SHOP.SHOP_ID WHERE PRODUCT_NAME LIKE '%$text%'";
        $data= oci_parse($conn,$SQL11);
        oci_execute($data);
        if($data){
            echo '<div class="featured-products">';
        while($val= oci_fetch_array($data)){
            $names= $val['PRODUCT_NAME'];
            echo '
            <div class="card">
            <a href = "product-display-page.php?id=' . $val['PRODUCT_ID'] . '">
                         <img src=./Traders/pro-img/' . $val['PRODUCT_IMAGE'] . ' alt="Img" style="width:100%"></a>
                        <div class="in-stock flex-verticle">
                            <h6><B>' . $val['SHOP_NAME'] . '</B> </h6>
                            <p class="instock-text"> '.$val['PRODUCT_STOCK'].' in Stock </p>
                        </div>
                        <h6>' . $val['PRODUCT_NAME'] . '</h6>
                        <p class="price">$Price : ' . $val['PRICE'] . ' &nbsp;&nbsp;&nbsp;<S>$3.30</S></p>
                        <p>' . $val['PRODUCT_DESCRIPTION'] . '</p>
                        <div class="flex-verticle">
                           <a href = "cart.php?id=' . $val['PRODUCT_ID'] . '"> <button class="btn btn1">Add to cart</button></a>
                            <p class="addtocart-icon">
                            <a href= "wish.php?id=' . $val['PRODUCT_ID'] . '"><i class="fa-regular fa-heart black"></i></a></p>
                        </div>
                    </div>
                
                ';
            }
            echo '</div>';
            
        
    }
}
        oci_close($conn);
    }elseif(isset($_POST['pricehigh'])){
        $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
        $pricesort= "SELECT * FROM PRODUCT JOIN SHOP ON PRODUCT.FK1_SHOP_ID = SHOP.SHOP_ID ORDER BY PRODUCT.PRICE DESC ";
        $pricequery= oci_parse($conn,$pricesort);
        oci_execute($pricequery);
        echo '<div class="featured-products">';
        while ($valueprice = oci_fetch_array($pricequery)) {

            echo '
        <div class="card">
        <a href = "product-display-page.php?id=' . $valueprice['PRODUCT_ID'] . '">
                     <img src=./Traders/pro-img/' . $valueprice['PRODUCT_IMAGE'] . ' alt="Img" style="width:100%"></a>
                    <div class="in-stock flex-verticle">
                        <h6><B>' . $valueprice['SHOP_NAME'] . '</B> </h6>
                        <p class="instock-text"> '.$valueprice['PRODUCT_STOCK'].' in Stock </p>
                    </div>
                    <h6>' . $valueprice['PRODUCT_NAME'] . '</h6>
                    <p class="price">$Price : ' . $valueprice['PRICE'] . ' &nbsp;&nbsp;&nbsp;<S>$3.30</S></p>
                    <p>' . $valueprice['PRODUCT_DESCRIPTION'] . '</p>
                    <div class="flex-verticle">
                       <a href = "cart.php?id=' . $valueprice['PRODUCT_ID'] . '"> <button class="btn btn1">Add to cart</button></a>
                        <p class="addtocart-icon">
                        <a href= "wish.php?id=' . $valueprice['PRODUCT_ID'] . '"><i class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            
            ';
        }
        echo '</div>';
        oci_close($conn);

        

    } elseif(isset($_POST['pricelow'])){
        $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
        $pricesort= "SELECT * FROM PRODUCT JOIN SHOP ON PRODUCT.FK1_SHOP_ID = SHOP.SHOP_ID ORDER BY PRODUCT.PRICE ASC ";
        $pricequery= oci_parse($conn,$pricesort);
        oci_execute($pricequery);
        echo '<div class="featured-products">';
        while ($valueprice = oci_fetch_array($pricequery)) {

            echo '
        <div class="card">
        <a href = "product-display-page.php?id=' . $valueprice['PRODUCT_ID'] . '">
                     <img src=./Traders/pro-img/' . $valueprice['PRODUCT_IMAGE'] . ' alt="Img" style="width:100%"></a>
                    <div class="in-stock flex-verticle">
                        <h6><B>' . $valueprice['SHOP_NAME'] . '</B> </h6>
                        <p class="instock-text"> '.$valueprice['PRODUCT_STOCK'].' in Stock </p>
                    </div>
                    <h6>' . $valueprice['PRODUCT_NAME'] . '</h6>
                    <p class="price">$Price : ' . $valueprice['PRICE'] . ' &nbsp;&nbsp;&nbsp;<S>$3.30</S></p>
                    <p>' . $valueprice['PRODUCT_DESCRIPTION'] . '</p>
                    <div class="flex-verticle">
                       <a href = "cart.php?id=' . $valueprice['PRODUCT_ID'] . '"> <button class="btn btn1">Add to cart</button></a>
                        <p class="addtocart-icon">
                        <a href= "wish.php?id=' . $valueprice['PRODUCT_ID'] . '"><i class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            
            ';
        }
        echo '</div>';
        oci_close($conn);

    }elseif(isset($_POST['a-z'])){
        $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
        $pricesort= "SELECT * FROM PRODUCT JOIN SHOP ON PRODUCT.FK1_SHOP_ID = SHOP.SHOP_ID ORDER BY PRODUCT.PRODUCT_NAME ASC ";
        $pricequery= oci_parse($conn,$pricesort);
        oci_execute($pricequery);
        echo '<div class="featured-products">';
        while ($valueprice = oci_fetch_array($pricequery)) {

            echo '
        <div class="card">
        <a href = "product-display-page.php?id=' . $valueprice['PRODUCT_ID'] . '">
                     <img src=./Traders/pro-img/' . $valueprice['PRODUCT_IMAGE'] . ' alt="Img" style="width:100%"></a>
                    <div class="in-stock flex-verticle">
                        <h6><B>' . $valueprice['SHOP_NAME'] . '</B> </h6>
                        <p class="instock-text"> '.$valueprice['PRODUCT_STOCK'].' in Stock </p>
                    </div>
                    <h6>' . $valueprice['PRODUCT_NAME'] . '</h6>
                    <p class="price">$Price : ' . $valueprice['PRICE'] . ' &nbsp;&nbsp;&nbsp;<S>$3.30</S></p>
                    <p>' . $valueprice['PRODUCT_DESCRIPTION'] . '</p>
                    <div class="flex-verticle">
                       <a href = "cart.php?id=' . $valueprice['PRODUCT_ID'] . '"> <button class="btn btn1">Add to cart</button></a>
                        <p class="addtocart-icon">
                        <a href= "wish.php?id=' . $valueprice['PRODUCT_ID'] . '"><i class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            
            ';
        }
        echo '</div>';
        oci_close($conn);

        

    }elseif(isset($_POST['z-a'])){
        $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
        $pricesort= "SELECT * FROM PRODUCT JOIN SHOP ON PRODUCT.FK1_SHOP_ID = SHOP.SHOP_ID ORDER BY PRODUCT.PRODUCT_NAME DESC ";
        $pricequery= oci_parse($conn,$pricesort);
        oci_execute($pricequery);
        echo '<div class="featured-products">';
        while ($valueprice = oci_fetch_array($pricequery)) {

            echo '
        <div class="card">
        <a href = "product-display-page.php?id=' . $valueprice['PRODUCT_ID'] . '">
                     <img src=./Traders/pro-img/' . $valueprice['PRODUCT_IMAGE'] . ' alt="Img" style="width:100%"></a>
                    <div class="in-stock flex-verticle">
                        <h6><B>' . $valueprice['SHOP_NAME'] . '</B> </h6>
                        <p class="instock-text"> '.$valueprice['PRODUCT_STOCK'].' in Stock </p>
                    </div>
                    <h6>' . $valueprice['PRODUCT_NAME'] . '</h6>
                    <p class="price">$Price : ' . $valueprice['PRICE'] . ' &nbsp;&nbsp;&nbsp;<S>$3.30</S></p>
                    <p>' . $valueprice['PRODUCT_DESCRIPTION'] . '</p>
                    <div class="flex-verticle">
                       <a href = "cart.php?id=' . $valueprice['PRODUCT_ID'] . '"> <button class="btn btn1">Add to cart</button></a>
                        <p class="addtocart-icon">
                        <a href= "wish.php?id=' . $valueprice['PRODUCT_ID'] . '"><i class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            
            ';
        }
        echo '</div>';
        oci_close($conn);

        

    }elseif(isset($_GET['categoryName'])){
        $na= $_GET['categoryName'];
        $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
        $catSQL= "SELECT * FROM PRODUCT_CATEGORY WHERE CATEGORY_TYPE='$na'";
        $catQuery= oci_parse($conn,$catSQL);
        oci_execute($catQuery);

        if($catQuery){
            $catValue= oci_fetch_array($catQuery);
            $category_id= $catValue['PRODUCT_CATEGORY_ID'];
            $SQL = "SELECT * FROM PRODUCT, SHOP WHERE PRODUCT.FK1_SHOP_ID = SHOP.SHOP_ID AND PRODUCT.PRODUCT_STATUS = 1 AND PRODUCT.FK2_PRODUCT_CATEGORY_ID='$category_id'";
        $queery = oci_parse($conn, $SQL);
        oci_execute($queery);
        echo '<div class="featured-products">';
        while ($value = oci_fetch_array($queery)) {

            echo '
        <div class="card">
        <a href = "product-display-page.php?id=' . $value['PRODUCT_ID'] . '">
                     <img src=./Traders/pro-img/' . $value['PRODUCT_IMAGE'] . ' alt="Img" style="width:100%"></a>
                    <div class="in-stock flex-verticle">
                        <h6><B>' . $value['SHOP_NAME'] . '</B> </h6>
                    <p class="instock-text"> '.$value['PRODUCT_STOCK'].' in Stock </p>
                    </div>
                    <h6>' . $value['PRODUCT_NAME'] . '</h6>
                    <p class="price">$Price : ' . $value['PRICE'] . ' &nbsp;&nbsp;&nbsp;<S>$3.30</S></p>
                    <p>' . $value['PRODUCT_DESCRIPTION'] . '</p>
                    <div class="flex-verticle">
                       <a href = "cart.php?id=' . $value['PRODUCT_ID'] . '"> <button class="btn btn1">Add to cart</button></a>
                        <p class="addtocart-icon">
                        <a href= "wish.php?id=' . $value['PRODUCT_ID'] . '"><i class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            
            ';
        }
        echo '</div>';
        oci_close($conn);

        }
        

    }else{
        $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
        $SQL = "SELECT * FROM PRODUCT, SHOP WHERE PRODUCT.FK1_SHOP_ID = SHOP.SHOP_ID AND PRODUCT.PRODUCT_STATUS = 1";
        $queery = oci_parse($conn, $SQL);
        oci_execute($queery);
        echo '<div class="featured-products">';
        while ($value = oci_fetch_array($queery)) {

            echo '
        <div class="card">
        <a href = "product-display-page.php?id=' . $value['PRODUCT_ID'] . '">
                     <img src=./Traders/pro-img/' . $value['PRODUCT_IMAGE'] . ' alt="Img" style="width:100%"></a>
                    <div class="in-stock flex-verticle">
                        <h6><B>' . $value['SHOP_NAME'] . '</B> </h6>
                        <p class="instock-text"> '.$value['PRODUCT_STOCK'].' in Stock </p>
                    </div>
                    <h6>' . $value['PRODUCT_NAME'] . '</h6>
                    <p class="price">$Price : ' . $value['PRICE'] . ' &nbsp;&nbsp;&nbsp;</p>
                    <p>' . $value['PRODUCT_DESCRIPTION'] . '</p>
                    <div class="flex-verticle">
                       <a href = "cart.php?id=' . $value['PRODUCT_ID'] . '"> <button class="btn btn1">Add to cart</button></a>
                        <p class="addtocart-icon">
                        <a href= "wish.php?id=' . $value['PRODUCT_ID'] . '"><i class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            
            ';
        }
        echo '</div>';
        oci_close($conn);
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

<head>