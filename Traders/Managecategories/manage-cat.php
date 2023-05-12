<?php
include('../../session.php');
include('../session-trader.php');

$userid = $_SESSION['id'];
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

<button><a href="./add-cat.php">Add Categories</a></button>
<table class="table table-hover">
  <tr>
    <th>Categories Type</th>
    <th>Delete</th>
</tr>
<?php
 $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
 $SQLI = "SELECT * FROM PRODUCT_CATEGORY WHERE FK1_USER_ID = '$userid' ";
 $queeryok = oci_parse($conn, $SQLI); //Check whether shop is there or not
 oci_execute($queeryok);  //If yes then ececute


 while ($value = oci_fetch_array($queeryok)) {
    if($value['STATUS'] == 1){

   
    echo '
    <tr>
    <td>'.$value['CATEGORY_TYPE'].'</td>
    <td> <a href = "delete-products.php?id='.$value['PRODUCT_CATEGORY_ID'].' ">Delete</a></td>

</tr>
    ';
}
 }
?>  
</table>
</body>
</html>