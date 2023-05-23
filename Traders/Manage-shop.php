<?php
include('../session.php');
include('./session-trader.php');

$userid =  $_SESSION['id'];

?>

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
<button><a href="./trader-dash.php"> Dashboard</a></button>
<button><a href="add-shop.php"> Add Shop</a></button>
<table class="table table-hover">
  <tr>
    <th>Shop Name</th>
    <th>Shop Address</th>
    <th>Shop Phone Number</th>
    <th>Shop Email</th>
    <th>Delete</th>
</tr>
<?php
 $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
 $SQLI = "SELECT * FROM SHOP WHERE FK1_USER_ID =  '$userid' ";
 $queeryok = oci_parse($conn, $SQLI); //Check whether shop is there or not
 oci_execute($queeryok);  //If yes then ececute

 while ($values = oci_fetch_array($queeryok)) {
    if($values['STATUS'] == 1){

   
    echo '
    <tr>
    <td>'.$values['SHOP_NAME'].'</td>
    <td>'.$values['SHOP_ADDRESS'].'</td>
    <td>'.$values['SHOP_PHONE_NUMBER'].'</td>
    <td>'.$values['SHOP_EMAIL'].'</td>
    <td> <a href = "delete-shop.php?id='.$values['SHOP_ID'].' ">Delete</a></td>

</tr>
    ';
}
    
 }

?>
   
</table>
</body>
</html>