<?php

$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
$sql = "SELECT * FROM DEMO_ORDERS";
$query = oci_parse($conn, $sql);
oci_execute($query);

while ( $ok = oci_fetch_array($query)){
   
    echo $ok['ORDER_ID'];
}


?>