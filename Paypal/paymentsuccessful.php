<?php
session_start();
if (isset($_GET['PayerID'])) {
    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    $sql = "update CART set STATUS=1 where CART_ID=" . $_SESSION['cart_id'];
    $qry = oci_parse($conn, $sql);
    if (oci_execute($qry)) {
        $sql = "insert into PAYMENT(TRANSACTION,USER_ID,ORDER_ID) values('" . $_GET['PayerID'] . "'," . $_SESSION['uid'] . ",(select ORDER_ID from ORDER_TABLE where CART_ID=" . $_SESSION['cart_id'] . "))";
        $qry = oci_parse($conn, $sql);
        if (oci_execute($qry)) {
            $sql = "select * from USER_PRODUCT up join PRODUCT p on p.PRODUCT_ID=up.PRODUCT_ID join CART c on c.CART_ID=up.CART_ID where c.CART_ID=" . $_SESSION['cart_id'];
            $qry = oci_parse($conn, $sql);
            oci_execute($qry);
            $num_row = oci_fetch_all($qry, $res);
            if ($num_row > 0) {
                for ($i = 0; $i < $num_row; $i++) {
                    $product_id = $res['PRODUCT_ID'][$i];
                    $quantity = $res['QUANTITY'][$i];
                    $sql = "update PRODUCT set STOCK_AMOUNT=STOCK_AMOUNT-$quantity where PRODUCT_ID=$product_id";
                    $qry = oci_parse($conn, $sql);
                    $execute = oci_execute($qry);
                }
                if ($execute) {
                    header('Location: http://localhost/Hm-Ecommerce-master/Addtocart.php',);
                }
            }
        }
    }
}