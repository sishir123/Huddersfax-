<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<button><a href="add-shop.php"> Add Shop</a></button>
<table class="table table-hover">
  <tr>
    <th>Shop Name</th>
    <th>Shop Address</th>
    <th>Shop Phone Number</th>
    <th>Shop Type</th>
    <th>Shop Email</th>
    <th>Delete</th>
</tr>
<?php
 $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
 $SQLI = "SELECT * FROM SHOP";
 $queeryok = oci_parse($conn, $SQLI); //Check whether shop is there or not
 oci_execute($queeryok);  //If yes then ececute

 while ($value = oci_fetch_array($queeryok)) {
    echo '
    <tr>
    <td>'.$value['SHOP_NAME'].'</td>
    <td>'.$value['SHOP_ADDRESS'].'</td>
    <td>'.$value['SHOP_PHONE_NUMBER'].'</td>

    <td>'.$value['SHOP_TYPE'].'</td>
    <td>'.$value['SHOP_EMAIL'].'</td>
    <td> <a href = "delete-shop.php?id='.$value['SHOP_ID'].' ">Delete</a></td>

</tr>
    ';
    
 }

?>
   
</table>
</body>
</html>