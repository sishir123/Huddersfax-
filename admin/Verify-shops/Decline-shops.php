<?php

$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    //Gather id sent from crud.php page
    $activateID = $_GET['id'];

    $updateStatus= "UPDATE SHOP SET STATUS = 522 WHERE SHOP_ID='$activateID'";
    $queryStatus= oci_parse($conn,$updateStatus);
    oci_execute($queryStatus);
    if($queryStatus){
        header('Location:../Verify-shops.php');
    }else{
        echo "Error";
    }
    ?>