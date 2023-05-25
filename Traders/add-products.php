<?php
include('../session.php');
include('./session-trader.php');

// $Category = $_SESSION['Category'];
$session_var = $_SESSION['id'];
$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');

$SQLI = "SELECT * FROM SHOP WHERE FK1_USER_ID = '$session_var'";
$query = oci_parse($conn, $SQLI);
oci_execute($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Css/style.css" />

  <title>Document</title>
  <style>
    * {
  box-sizing: border-box;
  margin: 0px;
  padding: 0px;
}

html {
  height: 100%;
  scrollbar-width: none;
  -ms-overflow-style: none;
}

body {
  font-family: 'Raleway', sans-serif;
  line-height: 1.8;
  background: #FFE799;
  height: auto;
  
}



body::-webkit-scrollbar {
  display: none;
}

a {
  text-decoration: none;
}

#container {
 
  margin: 100px auto;
  max-width: 400px;
  padding-right: 50px;
}

.form-wrap {
  padding: 15px 25px;
  color: #333;
  
}

.form-wrap h1,
.form-wrap p {
  text-align: center;
}

.form-wrap .form-group {
  margin-top: 15px;
}

.form-wrap .form-group label {
  display: block;
  color: #666;
}

.form-wrap .form-group input {
  width: 300px;
  padding: 10px;
  border: #ddd 1px solid;
  border-radius: 5px;
}

 .form-wrap button {
  width: 300px;
  /* background-color: #a28089; */
  padding: 10px;
  margin-top: 20px;
  /* color: white; */
  cursor: pointer;
}

/*  
.form-wrap button:hover {
  background-color: #915647;
  color: black;
}

.form-wrap .button-text {
  font-size: 13px;
  margin-top: 20px;
} */

.navigation {
  display: flex;
  flex-flow: row wrap;
  justify-content: flex-end;
  list-style: none;
  margin: 0;
  background: #a28089;
}

.navigation a {
  text-decoration: none;
  display: block;
  padding: 1em;
  color: white;
}

.navigation a:hover {
  background: #915647;
}

@media all and (max-width: 800px) {
  .navigation {
    justify-content: space-around;
  }
}

@media all and (max-width: 600px) {
  .navigation {
    flex-flow: column wrap;
    padding: 0;
  }

  .navigation a {
    text-align: center;
    padding: 10px;
    border-top: 1px solid rgba(255, 255, 255, 0.3);
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  }

  .navigation li:last-of-type a {
    border-bottom: none;
  }
}

.logo {
  width: 10%;
  height: 7.4%;
  position: fixed;
  left: 0px;
}

.card-img-top {
  width: 100%;
  height: 200px;
  object-fit: contain;
}

.admin_image {
  width: 100px;
  object-fit: contain;
}

/* Buttons */
/* Buttons */
.btn{
  background: none;
  border: 1px solid #000;
  font-family: "montserrat",sans-serif;
  padding: 6px 20px;
  min-width: 200px;
  margin: 10px;
  cursor: pointer;
  transition: color 0.4s linear;
  position: relative;
}

.btn:hover{
  color: #fff;
}
.btn::before{
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: #000;
  z-index: -1;
  transition: transform 0.5s;
  transform-origin: 0 0;
  transition-timing-function: cubic-bezier(0.5,1.6,0.4,0.7);
}
.btn1::before{
  transform: scaleX(0);
}
.btn2::before{
  transform: scaleY(0);
}
.btn1:hover::before{
  transform: scaleX(1);
}
.btn2:hover::before{
  transform: scaleY(1);
}
/* For login here and register here */

.login-registration{
  text-decoration: none;
  color: #000;
  margin-right: 50px;;
}
.form{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.otp_root {
  width: 400px;
  height: 400px;
  background-color: #f2f2f2;
  border: 1px solid #ccc;
  border-radius: 5px;
}
  .hey{
    text-align: center;
    padding-top: 40px;
    padding-right: 80px;
  }
    </style>
</head>
<body>
<button class="btn btn1"><a href="../Traders/Dashboard.php"> Dashboard</a></button>

  <?php
  if (isset($_POST['codesubmit'])) {

    $Productname = $_POST['Product-name'];
    $Productdes = $_POST['Product-des'];
    $Productprice = $_POST['Product-price'];
    $Productquantity = $_POST['Product-quantity'];
    $Productstock = $_POST['Product-stock'];
    $Minorder = $_POST['Min-order'];
    $Category = $_POST['Category'];
    $Maxorder = $_POST['Max-order'];
    $Productimg = basename($_FILES["Productimg"]["name"]);
    $tempname = $_FILES["Productimg"]["tmp_name"];
    $folder = './pro-img/' . $Productimg;
    move_uploaded_file($tempname, $folder);
    $selectshop = $_POST['SHOP'];

    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    $SQLI = "INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRICE, PRODUCT_QUANTITY, PRODUCT_STOCK, MIN_ORDER, MAX_ORDER, PRODUCT_IMAGE ,FK1_SHOP_ID, FK2_PRODUCT_CATEGORY_ID, ALLERGY_INFO) VALUES('$Productname', '$Productdes','$Productprice','$Productquantity','$Productstock','$Minorder','$Maxorder','$Productimg','$selectshop','$Category', 'allergy-info')";
    $queeryok = oci_parse($conn, $SQLI);
    oci_execute($queeryok);
  }
  ?>
<h1 class="hey">Add Products</h1>
<div id="container">
    <div class="form-wrap">
  <form method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label">Product Name</label>
      <input type="text" class="input"id="exampleInputEmail1" aria-describedby="emailHelp" name="Product-name">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label">Product Description</label>
      <input type="text" class="input" id="exampleInputEmail1" aria-describedby="emailHelp" name="Product-des">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label">Price</label>
      <input type="number" class="input" id="exampleInputEmail1" aria-describedby="emailHelp" name="Product-price">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
      <input type="number" class="input" id="exampleInputEmail1" aria-describedby="emailHelp" name="Product-quantity">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label">Product Stock</label>
      <input type="number" class="input" id="exampleInputPassword1" name="Product-stock">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label">Min Order</label>
      <input type="number" class="input" id="exampleInputPassword1" name="Min-order">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label">Max Order</label>
      <input type="number" class="input" id="exampleInputPassword1" name="Max-order">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label">Product Image</label>
      <input type="file" class="input" id="inputGroupFile02" name="Productimg">
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Allergy Info</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="allergy-info">
    </div>

    <!-- For shop -->
    <div class="form-group">
    <label for="">Choose Shop:</label>
    <select name="SHOP">

      <?php
      $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
      $SQLI = "SELECT * FROM SHOP  WHERE FK1_USER_ID =  '$session_var'";
      $queeryok = oci_parse($conn, $SQLI);
      oci_execute($queeryok);
      echo $session_var;

      while ($values = oci_fetch_array($queeryok)) {

        echo '
<option value="' . $values['SHOP_ID'] . '">' . $values['SHOP_NAME'] . '</option>';
      }
      ?>
    </select>
    <div class="form-group">
    <label for="">Choose Category:</label>
    <select name="Category">
      <?php
          $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
      $SQLI = "SELECT * FROM PRODUCT_CATEGORY  WHERE FK1_USER_ID =  '$session_var'";
      $queeryok = oci_parse($conn, $SQLI);
      oci_execute($queeryok);
      echo $session_var;

      while ($values = oci_fetch_array($queeryok)) {

        echo '
<option value="' . $values['PRODUCT_CATEGORY_ID'] . '">' . $values['CATEGORY_TYPE'] . '</option>';
      }
      ?>
    </select>
    </div>
    </div>
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="codesubmit"></button>
    </div>
  </form>
  </div>
  </div>
</body>

</html>