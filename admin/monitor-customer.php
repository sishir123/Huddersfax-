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
    <button><a href="./admin-dash.php">Dashboard</a></button>


<table class="table table-hover">
  <tr>
    <th>User Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Address</th>
    <th>Status</th>
</tr>
<?php
 $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
 $SQLI = "SELECT * FROM S_USER WHERE USER_ROLE = 'USER' ";
 $queeryok = oci_parse($conn, $SQLI); //Check whether shop is there or not
 oci_execute($queeryok);  //If yes then ececute

 while ($value = oci_fetch_array($queeryok)) {
    if($value['IS_VERIFIED'] == 1){

   
    echo '
    <tr>
    <td>'.$value['USER_NAME'].'</td>
    <td>'.$value['EMAIL'].'</td>
    <td>'.$value['PHONENUMBER'].'</td>
    <td>'.$value['ADDRESS'].'</td>
    <td> <a href = "Deactivate-customer-admin.php?id='.$value['USER_ID'].' ">Activate</a></td></tr>';
}
if($value['IS_VERIFIED'] == 2){

   
    echo '
    <tr>
    <td>'.$value['USER_NAME'].'</td>
    <td>'.$value['EMAIL'].'</td>
    <td>'.$value['PHONENUMBER'].'</td>
    <td>'.$value['ADDRESS'].'</td>
    <td> <a href = "Activate-customer-admin.php?id='.$value['USER_ID'].' ">DeActivate</a></td></tr>';
    }
    
 }

?>
   
</table>
</body>
</html>