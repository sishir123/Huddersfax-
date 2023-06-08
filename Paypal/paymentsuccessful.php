<?php
session_start();
if(isset($_SESSION['id'])){
    $user= $_SESSION['id'];
}


if (isset($_GET['PayerID'])) {
    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    echo $_SESSION['totalamount'];
        $sql = "insert into PAYMENT(PAYMENT_AMOUNT,FK1_USER_ID,FK2_ORDER_ID) values('" .$_SESSION['totalamount'] . "'," . $_SESSION['id'] . ",(select ORDER_ID from ORDER_ITEM WHERE FK1_CART_ID = (SELECT CART_ID FROM CART WHERE FK1_USER_ID='$user' AND STATUS='1')))";
        $qry = oci_parse($conn, $sql);
        if (oci_execute($qry)){
            $sql = "select * from CART_PRODUCT cp join PRODUCT p on p.PRODUCT_ID=cp.FK1_PRODUCT_ID join CART c on c.CART_ID=cp.FK2_CART_ID where c.CART_ID=(SELECT CART_ID FROM CART WHERE FK1_USER_ID='$user' AND STATUS='1')";
            $qry = oci_parse($conn, $sql);
            oci_execute($qry);
            if($qry){
                $sqlcart = "UPDATE CART SET STATUS=0 WHERE STATUS='1'";
                $qrycart = oci_parse($conn, $sqlcart);
                oci_execute($qrycart);
            $num_row = oci_fetch_all($qry, $res);
            if ($num_row > 0) {
                for ($i = 0; $i < $num_row; $i++) {
                    $product_id = $res['PRODUCT_ID'][$i];
                    $quantity = $res['CART_QUANTITY'][$i];
                    $sql = "update PRODUCT set PRODUCT_STOCK=PRODUCT_STOCK-$quantity where PRODUCT_ID=$product_id";
                    $qry = oci_parse($conn, $sql);
                    $execute = oci_execute($qry);
                }
                if ($execute) {
                    header('Location: http://localhost/Hm-Ecommerce-master/Addtocart.php');
                }
            }
        }
    
    }
}
?>

<?php
 $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
 $SQLI = "SELECT * FROM PAYMENT WHERE FK1_USER_ID = $user";
 $queeryok = oci_parse($conn, $SQLI);
 oci_execute($queeryok);  //If yes then eXecute

  if ($execute) {
    $to = $_POST['myGeeks'];
    $subject = 'Invoice for your payments.';
    $message = "Hello Sir/Mam !\n\n Here is your invoice for the purchase made by you. Date of the purchase : '. $value['PRODUCT_ID'] .'  and the total amount is  '. $value['PRODUCT_ID'] .'";

    $headers = "From: huddersfaxmart@gmail.com\r\nReply-To: kharelsishir1000@gmail.com";
    $mail_sent = mail($to, $subject, $message, $headers);
    if ($mail_sent == true) {
       
    } else {
        echo "Mail failed";
    }
}
?>
