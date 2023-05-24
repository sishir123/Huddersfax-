
<?php
session_start();
if(isset($_SESSION['id'])){
    $userid = $_SESSION['id'];
}

$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
$product = $_GET['id'];
$cartItem = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = '$product'";
$queery2 = oci_parse($conn, $cartItem);
oci_execute($queery2);

if ($queery2) {
    $value =  oci_fetch_array($queery2);
    $cartitem = $value['PRODUCT_NAME'];
    oci_free_statement($queery2);
    $cartID = "SELECT * FROM CART WHERE FK1_USER_ID = '$userid' AND STATUS='0'";
    $queery3 = oci_parse($conn, $cartID);
    oci_execute($queery3);

   
    if ($queery3) {
        $value3 = oci_fetch_array($queery3);
        $cartid = $value3['CART_ID'];
       
        if($value3['FK1_USER_ID'] == $userid AND $value3['STATUS']=='0'){
        $SQLI2 = "SELECT * FROM CART_PRODUCT WHERE FK1_PRODUCT_ID = '$product'";
        $queery2 = oci_parse($conn, $SQLI2);
        oci_execute($queery2);

        if($queery2){
        $value4 = oci_fetch_array($queery2);
            if($value4['FK1_PRODUCT_ID'] == $product){
                echo '
                <script>
                alert("Aleardy existed");
                </script>
                ';

            }else{
                $SQLI = "INSERT INTO CART_PRODUCT(CART_ITEM,CART_QUANTITY,FK1_PRODUCT_ID,FK2_CART_ID) VALUES ('$cartitem','1','$product','$cartid')";
                $queery4 = oci_parse($conn, $SQLI);
                oci_execute($queery4);
                if($queery4){
            
                    header('Location:'. $_SERVER["HTTP_REFERER"]);
                }

            }
        }

        $_SESSION['cartid'] = $cartid;
       
    }else{
        $SQL = "INSERT INTO CART(FK1_USER_ID,STATUS) VALUES ('$userid','0') ";
        $queery = oci_parse($conn, $SQL);
        oci_execute($queery);
        if($queery){
            $cartID = "SELECT * FROM CART WHERE FK1_USER_ID = '$userid'";
            $queery3 = oci_parse($conn, $cartID);
            oci_execute($queery3);
            if ($queery3) {
                $value2 = oci_fetch_array($queery3);
                $cartid = $value2['CART_ID'];
                $_SESSION['cartid'] = $cartid;
                $SQLI = "INSERT INTO CART_PRODUCT(CART_ITEM,CART_QUANTITY,FK1_PRODUCT_ID,FK2_CART_ID) VALUES ('$cartitem','1','$product','$cartid')";
                $queery4 = oci_parse($conn, $SQLI);
                oci_execute($queery4);
                if($queery4){
                    header('Location:'. $_SERVER["HTTP_REFERER"]);
                    
                }
            }
        }
        
    }
    
    } 
    }

