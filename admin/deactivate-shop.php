<?php

$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    //Gather id sent from crud.php page
    $DeactivateID = $_GET['id'];

    $updateStatus= "UPDATE SHOP SET STATUS = 2 WHERE SHOP_ID='$DeactivateID'";
    $queryStatus= oci_parse($conn,$updateStatus);
    oci_execute($queryStatus);
    if($queryStatus){
        header('Location:./manage-shop.php');
    }else{
        echo "Error";
    }
    ?>