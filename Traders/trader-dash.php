<?php
include('../session.php');
include('./session-trader.php');

$session_var = $_SESSION['id'];
$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
$SQLI = "SELECT * FROM PRODUCT_CATEGORY WHERE FK1_USER_ID = '$session_var'";
$query = oci_parse($conn, $SQLI);
oci_execute($query);

if($query){
   $store_var =  oci_fetch_array($query);
   $filler = $store_var['PRODUCT_CATEGORY_ID'];
   $_SESSION['Category'] = $filler;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Huddersfax Mart</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="../Css/style.css"/>
    <link rel="stylesheet" href="../Css/trader.css">

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
</head>

<body>

<!-- Navbar -->
    <input type="checkbox" id="check" />
    <nav>
        <a href="./trader-dash.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
        <ol>
            <li>
                <a href="./Edit profile/trader-edit-profile.php" class="Hover-btn"><i class="fa-solid fa-user"></i> Edit profile</a>
            </li>
            <li>
            <a href="" class="Hover-btn"><i class="fa-solid fa-user"></i> View Profile</a>
            </li>

            <li>
                <a href="../logout.php" class="Hover-btn"><i class="fa-solid fa-arrow-left"></i></i>Logout</a>
            </li>

        </ol>
    </nav>

    <!-- Dashboard -->

    <div class="container">
        <div class="title">
        <h2>Huddersfax Mart Trader Dashboard</h2>
        </div>

        <!-- Side nav -->

        <ul class="list-group">
        <button class="list-group-item"> <a href="./Dashboard.php"> Dashboard</a></button>
            <button class="list-group-item"> <a href="./Manage-products.php">Manage Products</a> </button>
            <button class="list-group-item"> <a href="./Manage-offers.php">Manage Offers </a></button>
            <button class="list-group-item"> <a href="./Managecategories/manage-cat.php">Manage Categories</a></button>
            <button class="list-group-item"><a href="Manage-shop.php">Manage Shops</a></button>
            <button class="list-group-item">View Report</button>
</ul>

    </div>
</body>

</html>