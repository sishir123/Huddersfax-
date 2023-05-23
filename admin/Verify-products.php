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
    <th>PRODUCT NAME</th>
    <th>PRODUCT DESCRIPTION</th>
    <th>PRICE</th>
    <th>PRODUCT QUANTITY</th>
    <th>PRODUCT STOCK</th>
    <th>MIN ORDER</th>
    <th>MAX ORDER</th>
    <th>Approval</th>
    <th>Declined</th>
</tr>
<?php
 $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
 $SQLI = "SELECT * FROM PRODUCT";
 $queeryok = oci_parse($conn, $SQLI); //Check whether shop is there or not
 oci_execute($queeryok);  //If yes then ececute


 while ($value = oci_fetch_array($queeryok)) {
    if($value['PRODUCT_STATUS'] == 0){
    echo '
    <tr>
    <td>'.$value['PRODUCT_NAME'].'</td>
    <td>'.$value['PRODUCT_DESCRIPTION'].'</td>
    <td>'.$value['PRICE'].'</td>
    <td>'.$value['PRODUCT_QUANTITY'].'</td>
    <td>'.$value['PRODUCT_STOCK'].'</td>
    <td>'.$value['MIN_ORDER'].'</td>
    <td>'.$value['MAX_ORDER'].'</td>
    <td> <a href = "./Approve-products.php.?id='.$value['PRODUCT_ID'].' ">Approve</a></td>
    <td> <a href = "./Decline-products.php?id='.$value['PRODUCT_ID'].' ">Decline</a></td></tr>';
    
 }


 
}

?>
   

</table>
</body>
</html>