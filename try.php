<?php

// $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
// $sql = "SELECT * FROM DEMO_ORDERS";
// $query = oci_parse($conn, $sql);
// oci_execute($query);

// while ( $ok = oci_fetch_array($query)){
//     echo $ok['ORDER_ID'];
// }


?>

<form action="" method="post">

 <input type="text" name="Registerhere" placeholder="Enter your code:">
 <input type="submit" name="codesubmit" value="submit">



</form>

<?php
if(isset($_POST['submit'])){
$code = $_POST['Registerhere']; 
$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
$sqla = "SELECT * FROM S_USER WHERE CODE = '$code' ";
$query1 = oci_parse($conn, $sqla);
oci_execute($query1);

if($query1 == 1){
    $value = oci_fetch_array($query1);
    if($value['IS_VERIFIED'] == 0 ){
        $sqli3 = "UPDATE S_USER SET IS_VERIFIED = '1' WHERE CODE = '$value[CODE]' ";
        $query3 = oci_parse($conn, $sqli3);
        oci_execute($query3);
    }
// $sqli = "SELECT * FROM S_USER";
// $query = oci_parse($conn, $sqli);
// oci_execute($query);
// if($value = oci_fetch_array($query)){
//     $email = $value['EMAIL'];

// 
   
// }
}


}




?>

