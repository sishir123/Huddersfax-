<?php

$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');

$delete = $_GET['id'];  //--here--
$sqli = "DELETE FROM PRODUCT_CATEGORY WHERE PRODUCT_CATEGORY_ID = '$delete' ";
$queeryok = oci_parse($conn, $sqli); //Check whether shop is there or not
 oci_execute($queeryok);  //If yes then ececute 
if($queeryok){
    header('Location: ./manage-cat.php');
}
oci_close($conn);
?>