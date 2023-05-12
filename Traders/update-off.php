<?php
include('../session.php');
include('./session-trader.php');

$offerid = $_GET['id'];

if(isset($_POST['Submit'])){
    $offerstartdate = $_POST['offerStartDate'];
    $offerenddate = $_POST['offerEndDate'];
    $offerpercentage = $_POST['offerPercentage'];
    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    //Gather id sent from crud.php page
    $updateStatus= "UPDATE OFFER SET OFFER_START_DATE ='$offerstartdate', OFFER_END_DATE = '$offerenddate', OFFER_PERCENTAGE = ' $offerpercentage' WHERE OFFER_ID='$offerid'";
    $queryStatus= oci_parse($conn,$updateStatus);
    oci_execute($queryStatus);
    if($queryStatus){
        
        header('./Manage-offers.php');

    }else{
        echo "Error";
    }
    

}
?>