<?php
    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
if(isset($_GET['id'])){
    $productId= $_GET['id'];
    $data= "SELECT * FROM CART_PRODUCT WHERE FK1_PRODUCT_ID='$productId'";
    $dataqry= oci_parse($conn,$data);
    oci_execute($dataqry);
    if($dataqry){
        $values= oci_fetch_array($dataqry);
        print_r($values);
        if($values['CART_QUANTITY']>=1){
            $quantity= $values['CART_QUANTITY']+1;
            // echo $quantity;
            $update= "UPDATE CART_PRODUCT SET CART_QUANTITY='$quantity' WHERE FK1_PRODUCT_ID='$productId' ";
            $updateparse= oci_parse($conn,$update);
            oci_execute($updateparse);
            if($updateparse){
                header('Location:'. $_SERVER["HTTP_REFERER"]);
            }
            
        }
    }
}
?>