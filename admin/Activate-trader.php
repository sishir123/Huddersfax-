<?php

$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    //Gather id sent from crud.php page
    $activateID = $_GET['id'];

    $updateStatus= "UPDATE S_USER SET IS_VERIFIED = 1 WHERE USER_ID='$activateID'";
    $queryStatus= oci_parse($conn,$updateStatus);
    oci_execute($queryStatus);
    if($queryStatus){
        header('Location:./Manage-traders.php');
    }else{
        echo "Error";
    }
    ?>