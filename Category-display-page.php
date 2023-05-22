<?php
session_start();
if (isset($_SESSION['id'])) {
    $userid = $_SESSION['id'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Huddersfax Mart</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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




    <!-- Category Highlight -->
    <div class="sort">
        <p class="featured-text ls-1">Category Highlight</p>
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Price
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">Low to High</a></li>
                <li><a class="dropdown-item" href="#">High to Low</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Alfabetically
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">A - Z</a></li>
                <li><a class="dropdown-item" href="#">Z - A</a></li>
            </ul>
        </div>

    </div>




    <!-- Category-product -->


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
                            <p class="instock-text"> In Stock </p>
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
    }else{
        $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
        $SQL = "SELECT * FROM PRODUCT JOIN SHOP ON PRODUCT.FK1_SHOP_ID = SHOP.SHOP_ID";
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
                        <p class="instock-text"> In Stock </p>
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
            <input type="email" id="email" name="myGeeks" placeholder="Enter your Email" class="Email-place">
            <a href="#" class="Subscribe-text"> Subscribe</a> <BR><br>
        </div>
    </div>

    <!-- footer -->
    <div class="footer-container">
        <div class="Contact-row">
            <div class="Needhelp-text">
                Need Help?
            </div>
            <div class="middle">
                <a href="Contact-us-page.php"><button class="btn btn1">Contact Us</button></a>

            </div>
        </div>

        <div class="Links">
            <ol>
                <li> <a href="Homepage.php" class="links-btn">Home</a> </li>
                <li> <a href="#" class="links-btn">Bakery</a> </li>
                <li> <a href="#" class="links-btn">Butchers</a> </li>
                <li> <a href="#" class="links-btn">Greengrocer</a> </li>
                <li> <a href="#" class="links-btn">Fishmonger</a> </li>
                <li> <a href="#" class="links-btn">Delicatessen</a> </li>

            </ol>
        </div>

        <div class="policies Links">
            <ol>
                <li> <a href="#" class="links-btn">Refund Policy</a> </li>
                <li> <a href="#" class="links-btn">Return Policy</a> </li>
                <li> <a href="#" class="links-btn">Payments</a> </li>
            </ol>
        </div>
        <div class="Huddersfax-mart Links">
            <ol>
                <li> <a href="About-us.php" class="links-btn">About us</a> </li>
                <li> <a href="#" class="links-btn">Terms of Service</a> </li>
                <li> <a href="#" class="links-btn">Privacy policy</a> </li>

            </ol>
        </div>
        <div class="map">
            <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7891502642515!2d-1.7842727793207414!3d53.64438949499016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487962132bcdb7bb%3A0x653c3a498c896a17!2sHuddersfield%2C%20UK!5e0!3m2!1sen!2snp!4v1681277576705!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="hudder-map"></iframe></p>
        </div>


    </div>
</body>

<head>