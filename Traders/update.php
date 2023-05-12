<?php
include('../session.php');
include('./session-trader.php');

$productid = $_GET['id'];

if(isset($_POST['Submit'])){
    $productName = $_POST['productName'];
    $productDes = $_POST['productDes'];
    $productPrice = $_POST['productPrice'];
    $productQuantity = $_POST['productQuantity'];
    $productStock = $_POST['productStock'];
    $Minorder = $_POST['Minorder'];
    $Maxorder = $_POST['Maxorder'];
    $productImage = $_POST['productImage'];

    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    //Gather id sent from crud.php page
    $updateStatus= "UPDATE PRODUCT SET PRODUCT_NAME ='$productName', PRODUCT_DESCRIPTION = '$productDes', PRICE = '$productPrice', PRODUCT_QUANTITY = '$productQuantity', PRODUCT_STOCK = ' $productStock', MIN_ORDER = '$Minorder', MAX_ORDER = '$Maxorder', PRODUCT_IMAGE = '$productImage' WHERE PRODUCT_ID='$productid'";
    $queryStatus= oci_parse($conn,$updateStatus);
    oci_execute($queryStatus);
    if($queryStatus){
        
        header('./Manage-products.php');

    }else{
        echo "Error";
    }
    

}
?>