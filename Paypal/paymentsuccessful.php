<?php
session_start();
if (isset($_SESSION['id'])) {
    $user = $_SESSION['id'];
}


if (isset($_GET['PayerID'])) {
    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    $sql = "insert into PAYMENT(PAYMENT_AMOUNT,FK1_USER_ID,FK2_ORDER_ID) values('" . $_SESSION['totalamount'] . "'," . $_SESSION['id'] . ",(select ORDER_ID from ORDER_ITEM WHERE FK1_CART_ID = (SELECT CART_ID FROM CART WHERE FK1_USER_ID='$user' AND STATUS='1')))";
    $qry = oci_parse($conn, $sql);
    if (oci_execute($qry)) {
        $sql = "select * from CART_PRODUCT cp join PRODUCT p on p.PRODUCT_ID=cp.FK1_PRODUCT_ID join CART c on c.CART_ID=cp.FK2_CART_ID where c.CART_ID=(SELECT CART_ID FROM CART WHERE FK1_USER_ID='$user' AND STATUS='1')";
        $qry = oci_parse($conn, $sql);
        oci_execute($qry);
        if ($qry) {
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
                    $SQLI = "SELECT * FROM PAYMENT JOIN S_USER ON S_USER.USER_ID = PAYMENT.FK1_USER_ID";
                    $queeryok = oci_parse($conn, $SQLI);
                    oci_execute($queeryok);  //If yes then eXecute
                    $value = oci_fetch_array($queeryok);
                    $date = $value['PAYMENT_DATE'];
                    $paymntamt = $value['PAYMENT_AMOUNT'];

                    if ($queeryok) {
                        $to = $_SESSION['email'];
                        $from = "huddersfaxmart@gmail.com";
                        $fromName = "Huddersfax";
                        $subject = 'Invoice for your payments.';
                        $message =
                        'Hello Sir/Mam! Here is your invoice for the purchase made by you : 
                        <table>
                        <tr>
                        <th> Date of the purchase :</th>
                        <th> Total amount for the purchase:</th>
                        </tr>
                        <tr>
                        <td>' . $date . '</td>
                        <td>'  . $paymntamt . '</td>
                        </tr>
                        </table>';
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $headers .= 'From: ' . $fromName . '<' . $from . '>' . "\r\n";
                        if (mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $message, $headers)) {
                            header('Location: http://localhost/Hm-Ecommerce-master/Addtocart.php');
                        } else {
                            echo "Mail failed";
                        }
                    }
                }
            }
        }
    }
}
