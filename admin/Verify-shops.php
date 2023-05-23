<?php
include('../session.php');
include('./session-admin.php');
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

<button><a href="./admin-dash.php"> Dashboard</a></button>

<table class="table table-hover">
  <tr>
    <th>SHOP NAME</th>
    <th>SHOP ADDRESS</th>
    <th>SHOP PHONE_NUMBER</th>
    <th>SHOP EMAIL</th>
    <th>Approval</th>
    <th>Declined</th>
</tr>
<?php
 $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
 $SQLI = "SELECT * FROM SHOP";
 $queeryok = oci_parse($conn, $SQLI); //Check whether shop is there or not
 oci_execute($queeryok);  //If yes then ececute


 while ($value = oci_fetch_array($queeryok)) {
    if($value['STATUS'] == 0){
    echo '
    <tr>
    <td>'.$value['SHOP_NAME'].'</td>
    <td>'.$value['SHOP_ADDRESS'].'</td>
    <td>'.$value['SHOP_PHONE_NUMBER'].'</td>
    <td>'.$value['SHOP_EMAIL'].'</td>
    <td> <a href = "./Verify-shops/Approve-shops.php?id='.$value['SHOP_ID'].' ">Approve</a></td>
    <td> <a href = "./Verify-shops/Decline-shops.php?id='.$value['SHOP_ID'].' ">Decline</a></td></tr>';
    
 }


 
}

?>
   
</table>
</body>
</html>