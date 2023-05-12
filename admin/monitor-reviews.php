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

<table class="table table-hover">
  <tr>
    <th>Review Date</th>
    <th>Review</th>
    <th>Review Rating</th>
    <th>Delete</th>
</tr>
<?php
 $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
 $SQLI = "SELECT * FROM REVIEW";
 $queeryok = oci_parse($conn, $SQLI); //Check whether shop is there or not
 oci_execute($queeryok);  //If yes then ececute

 while ($value = oci_fetch_array($queeryok)) {
    echo '
    <tr>
    <td>'.$value['REVIEW_DATE'].'</td>
    <td>'.$value['REVIEW_FEEDBACK'].'</td>
    <td>'.$value['REVIEW_RATING'].'</td>
    <td> <a href = "delete-review.php?id='.$value['REVIEW_ID'].' ">Delete</a></td>
</tr>
    '; 
 }
?>
   
</table>
</body>
</html>