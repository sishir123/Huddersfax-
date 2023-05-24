<?php
include('../session.php');
include('./session-trader.php');

$Category = $_SESSION['Category'];
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
    <title>Document</title>
</head>
<body>
  
    <?php
    if(isset($_POST['submit'])){

    $Productname = $_POST['Product-name'];
    $Productdes = $_POST['Product-des'];
    $Productprice = $_POST['Product-price'];
    $Productquantity = $_POST['Product-quantity'];
    $Productstock = $_POST['Product-stock'];
    $Minorder = $_POST['Min-order'];
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

<form method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Product Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Product-name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Description</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Product-des">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Price</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Product-price">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Product-quantity">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Product Stock</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="Product-stock">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Min Order</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="Min-order">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Max Order</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="Max-order">
  </div>
  <div class="input-group mb-3">
  <label for="exampleInputPassword1" class="form-label">Product Image</label>
  <input type="file" class="form-control" id="inputGroupFile02" name="Productimg">
</div>

<!-- For shop -->

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
<option value="'.$values['SHOP_ID'].'">'.$values['SHOP_NAME'].'</option>';
}
  ?>
</select>

<!-- For Offer -->

<!-- <label for="">Choose Offer:</label>
<select name="Offer">
  
<!-- <?php
//  $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
//  $SQLI = "SELECT * FROM OFFER";
//  $queerryok = oci_parse($conn, $SQLI);
//  oci_execute($queerryok); 
//  while ($values = oci_fetch_array($queerryok)) {
 
//   echo '
// <option value="'.$values['OFFER_ID'].'">'.$values['OFFER_PERCENTAGE'].'</option>';
// }
  ?> -->
<!-- </select> -->


  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</body>
</html>