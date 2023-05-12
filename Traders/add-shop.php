<?php
include('../session.php');
include('./session-trader.php');


$userid = $_SESSION['id'];
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

    $shopname = $_POST['shopname'];
    $shopaddress = $_POST['shopaddress'];
    $shopphonenumber = $_POST['shopphonenumber'];
    $shopemail = $_POST['shopemail'];
     $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
     $SQLI = "INSERT INTO SHOP(SHOP_NAME, SHOP_ADDRESS, SHOP_PHONE_NUMBER, SHOP_EMAIL, FK1_USER_ID, STATUS) VALUES('$shopname', '$shopaddress','$shopphonenumber', '$shopemail', '$userid' ,0)";
     $queeryok = oci_parse($conn, $SQLI);
     oci_execute($queeryok);
    }
    ?>

<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >SHOP_NAME</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="shopname">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">SHOP_ADDRESS</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="shopaddress">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">SHOP_PHONE_NUMBER</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="shopphonenumber">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">SHOP_EMAIL</label>
    <input type="email" class="form-control" id="exampleInputPassword1" name="shopemail">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</body>
</html>