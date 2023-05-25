<?php
          if (isset($_POST['buynow'])) {
            $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
            $colId = $_SESSION['collid'];
            $SQLI = "INSERT INTO ORDER_ITEM (ORDER_QUANTITY,ORDER_AMOUNT,FK1_CART_ID,FK2_COLLECTION_ID) VALUES('$quantitytotals','$Total','$cart','$colId')";
            $querry = oci_parse($conn, $SQLI);
            oci_execute($querry);
            if ($querry) {
              echo "Success";
            }
          }
          ?>