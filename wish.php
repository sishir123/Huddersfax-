
<?php
session_start();
if (isset($_SESSION['id'])) {
    $userid = $_SESSION['id'];
} else {
    $userid = null;
}

if (isset($_SESSION['id'])) {
    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    if (isset($_GET['id'])) {


        $product = $_GET['id'];
        echo $product;
        $wishlistItem = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = '$product'";
        $queery2 = oci_parse($conn, $wishlistItem);
        oci_execute($queery2);
        if ($queery2) {

            $value =  oci_fetch_array($queery2);
            $wishListItem = $value['PRODUCT_NAME'];

            oci_free_statement($queery2);
            $wishID = "SELECT * FROM WISHLIST WHERE FK1_USER_ID = '$userid'";
            $queery3 = oci_parse($conn, $wishID);
            oci_execute($queery3);

            if ($queery3) {
                $value3 = oci_fetch_array($queery3);
                $wishid = $value3['WISHLIST_ID'];
                $fkuserid = $value3['FK1_USER_ID'];

                if ($value3['FK1_USER_ID'] == $userid) {
                    $_SESSION['wishid'] = $wishid;
                    $SQLI2 = "SELECT * FROM WISHLIST_PRODUCT WHERE PRODUCT_ID = '$product'";
                    $QUERRY = oci_parse($conn, $SQLI2);
                    oci_execute($QUERRY);

                    if ($QUERRY) {
                        $value4 = oci_fetch_array($QUERRY);
                        if ($value4['PRODUCT_ID'] == $product) {
                            //             echo '
                            // <script>
                            // alert("Aleardy existed");
                            // location.href = "./";
                            // </script>
                            // ';
                            header('Location:' . $_SERVER["HTTP_REFERER"]);
                        } else {
                            $SQLI = "INSERT INTO WISHLIST_PRODUCT(WISHLIST_ITEM,WISHLIST_ID,PRODUCT_ID) VALUES ('$wishListItem','$wishid','$product')";
                            $queery4 = oci_parse($conn, $SQLI);
                            oci_execute($queery4);
                            if ($queery4) {
                                header('Location:' . $_SERVER["HTTP_REFERER"]);
                            }
                        }
                    }
                } else {
                    $SQL = "INSERT INTO WISHLIST(FK1_USER_ID) VALUES ('$userid')";
                    $queery = oci_parse($conn, $SQL);
                    oci_execute($queery);
                    if ($queery) {
                        $wishID = "SELECT * FROM WISHLIST WHERE FK1_USER_ID = '$userid'";
                        $queery3 = oci_parse($conn, $wishID);
                        oci_execute($queery3);
                        if ($queery3) {
                            $value2 = oci_fetch_array($queery3);
                            $wishid = $value2['WISHLIST_ID'];
                            $_SESSION['wishid'] = $wishid;



                            $SQLI = "INSERT INTO WISHLIST_PRODUCT(WISHLIST_ITEM,WISHLIST_ID,PRODUCT_ID) VALUES ('$wishListItem','$wishid','$product')";
                            $queery4 = oci_parse($conn, $SQLI);
                            oci_execute($queery4);
                            if ($queery4) {
                                header('Location:' . $_SERVER["HTTP_REFERER"]);
                            }
                        }
                    }
                }
            }
        }
    }
}
