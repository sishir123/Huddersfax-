<?php
include('../session.php');
include('./session-trader.php');
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
     $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
     $SQLI = "INSERT INTO OFFER(OFFER_START_DATE, OFFER_END_DATE, OFFER_PERCENTAGE) VALUES('$Offerstartdate', '$Offerenddate','$Offerpercentage')";
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

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</body>
</html>