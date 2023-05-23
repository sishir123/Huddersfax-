<?php
include('../session.php');
include('./session-trader.php');

$session_var = $_SESSION['id'];
$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
$SQLI = "SELECT * FROM SHOP WHERE FK1_USER_ID = '$session_var'";
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
<button><a href="Manage-offers.php">Back to Offer</a></button>

    <?php
    if(isset($_POST['submit'])){

    $Offerstartdate = $_POST['Offer-start-date'];
    $Offerenddate = $_POST['Offer-end-date'];
    $Offerpercentage = $_POST['Offer-percentage'];
    $product = $_POST['prod'];
     $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
     $SQLI = "INSERT INTO OFFER(OFFER_START_DATE, OFFER_END_DATE, OFFER_PERCENTAGE,PRODUCT_ID) VALUES('$Offerstartdate', '$Offerenddate','$Offerpercentage',$product)";
     $queeryok = oci_parse($conn, $SQLI);
     oci_execute($queeryok);
     echo "Offer created successfully";
    }
    ?>

<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Offer Start Date</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Offer-start-date">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Offer End Date</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Offer-end-date">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Offer Percentage</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Offer-percentage">
  </div>

  <div class="offer">
  <label for="">For Products</label>
  <select name="prod">
    <?php
    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    $SQLI3 = "SELECT PRODUCT_NAME, PRODUCT_ID FROM PRODUCT, SHOP WHERE PRODUCT.FK1_SHOP_ID = SHOP.SHOP_ID AND SHOP.FK1_USER_ID = '$session_var'";
    $SQLI4 =oci_parse($conn, $SQLI3);
    oci_execute($SQLI4);
    

    while($rows = oci_fetch_array($SQLI4)){
      $pid = $rows[1];
      $pname = $rows[0];
      ?>
<option value = "<?php echo $pid;?>"><?php
echo $pname;


?></option>';
      <?php
    }
    
    ?>

 
</select>
</div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</body>
</html>