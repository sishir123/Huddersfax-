<?php
include('../session.php');
include('./session-trader.php');

$id = $_SESSION['id'];
$category = $_SESSION['Category'];
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

    <button><a href="add-products.php"> Add Products</a></button>
    <table class="table table-hover">
        <tr>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Price</th>
            <th>Product Quantity</th>
            <th>Product Stock</th>
            <th>Min Order</th>
            <th>Max Order</th>
            <th>Product Image</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
        $SQLI = "SELECT * FROM PRODUCT WHERE FK2_PRODUCT_CATEGORY_ID = '$category'";
        $queeryok = oci_parse($conn, $SQLI); //Check whether table is there or not
        oci_execute($queeryok);  //If yes then ececute

        while ($value = oci_fetch_array($queeryok)) {

            if($value['PRODUCT_STATUS'] == 1){
                
           

            echo '
    <tr>
    <td>' . $value['PRODUCT_NAME'] . '</td>
    <td>' . $value['PRODUCT_DESCRIPTION'] . '</td>
    <td>' . $value['PRICE'] . '</td>
    <td>' . $value['PRODUCT_QUANTITY'] . '</td>
    <td>' . $value['PRODUCT_STOCK'] . '</td>
    <td>' . $value['MIN_ORDER'] . '</td>
    <td>' . $value['MAX_ORDER'] . '</td>
    <td> <img src = "./pro-img/' . $value['PRODUCT_IMAGE'] . '" width="100px" height="100px"></td>
    <td> <a href = "update-products.php?id=' . $value['PRODUCT_ID'] . ' ">Update</a></td>                   
    <td> <a href = "delete-products.php?id=' . $value['PRODUCT_ID'] . ' ">Delete</a></td>                   
    </tr>';
}
        }

        ?>

    </table>
</body>

</html>