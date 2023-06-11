<?php

$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    
    $activateID = $_GET['id'];

    $updateStatus= "UPDATE PRODUCT SET PRODUCT_STATUS = 1 WHERE PRODUCT_ID='$activateID'";
    $queryStatus= oci_parse($conn,$updateStatus);
    oci_execute($queryStatus);
    if($queryStatus){
        header('Location:./Verify-products.php');
    }else{
        echo "Error";
    }
    ?>