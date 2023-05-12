<?php
include('../session.php');
include('./session-trader.php');


// $category = $_SESSION['Offer'];
$offer = $_GET['id'];
$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
$SQLI = "SELECT * FROM OFFER WHERE OFFER_ID = '$offer'";
$queeryok = oci_parse($conn, $SQLI); //Check whether table is there or not
oci_execute($queeryok);  //If yes then execute

$update = oci_fetch_array($queeryok);

?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  

<?php



echo '<form method="POST" action="./update-off.php?id='.$offer.'">';
?>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Offer Start Date</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="offerStartDate"   value="<?php echo $update['OFFER_START_DATE']; ?>">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Offer End Date</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="offerEndDate"  value="<?php echo $update['OFFER_END_DATE']; ?>">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Offer Percentage</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="offerPercentage"  value="<?php echo $update['OFFER_PERCENTAGE']; ?>">
    <div id="emailHelp" class="form-text"></div>
  </div>
  
  <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
</form>








