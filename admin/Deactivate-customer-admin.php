<?php

$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    //Gather id sent from crud.php page
    $DeactivateID = $_GET['id'];

    $updateStatus= "UPDATE S_USER SET IS_VERIFIED = 2 WHERE USER_ID='$DeactivateID'";
    $queryStatus= oci_parse($conn,$updateStatus);
    oci_execute($queryStatus);
    if($queryStatus){
        header('Location:./monitor-customer.php');
    }else{
        echo "Error";
    }
    ?>