<?php
include('../../session.php');
include('../session-trader.php');

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

    $Category_type = $_POST['Category_type'];
     $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
     $SQLI = "INSERT INTO PRODUCT_CATEGORY(CATEGORY_TYPE, STATUS, FK1_USER_ID) VALUES('$Category_type', 1 ,'$userid')";
     $queeryok = oci_parse($conn, $SQLI);
     oci_execute($queeryok);
    }

    ?>

<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Category type</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Category_type">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</body>
</html>