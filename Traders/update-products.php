<?php
include('../session.php');
include('./session-trader.php');


$category = $_SESSION['Category'];
$product = $_GET['id'];
$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');

$SQLI = "SELECT * FROM PRODUCT WHERE FK2_PRODUCT_CATEGORY_ID = '$category'";
$queeryok = oci_parse($conn, $SQLI); //Check whether table is there or not
oci_execute($queeryok);  //If yes then execute

$update = oci_fetch_array($queeryok);
?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  

<?php
echo '<form method="POST" action="./update.php?id='.$product.'">';
?>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="productName"   value="<?php echo $update['PRODUCT_NAME']; ?>">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Description</label>
    <textarea id="" cols="30" rows="10" class="form-control" name="productDes"  value=""><?php echo $update['PRODUCT_DESCRIPTION']; ?></textarea>
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Price</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="productPrice"  value="<?php echo $update['PRICE']; ?>">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="productQuantity"  value="<?php echo $update['PRODUCT_QUANTITY']; ?>">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Stock</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="productStock"  value="<?php echo $update['PRODUCT_STOCK']; ?>">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Min Order</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="Minorder"  value="<?php echo $update['MIN_ORDER']; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Max Order</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="Maxorder"  value="<?php echo $update['MAX_ORDER']; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" >Product image</label>
    <input type="file" class="form-control" id="exampleInputPassword1" name="productImage">
  </div>
  
  <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
</form>








