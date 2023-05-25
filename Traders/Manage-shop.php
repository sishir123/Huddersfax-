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

    <link rel="stylesheet" href="../Css/style.css" />

    <title>Document</title>

    <style>
        * {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        body {
            font-family: Helvetica;
            -webkit-font-smoothing: antialiased;
            background: #FFE799;

        }

        a {
            text-decoration: none;
            color: #4FC3A1;
        }

        

        .table {
            height: 300px;
            width: 300px;
            margin-left: 30rem;
        }

        h2 {
            text-align: center;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: white;
            padding: 30px 0;
        }

        /* Table Styles */

        .table-wrapper {
            margin: 30px 70px 70px;
            box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
        }

        .fl-table {
            border-radius: 5px;
            font-size: 12px;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            white-space: nowrap;
            background-color: white;
        }

        .fl-table td,
        .fl-table th {
            text-align: center;
            padding: 8px;
        }

        .fl-table td {
            border-right: 1px solid #f8f8f8;
            font-size: 12px;
        }

        .fl-table thead th {
            color: #ffffff;
            background: #4FC3A1;
        }


        .fl-table thead th:nth-child(odd) {
            color: #ffffff;
            background: #324960;
        }

        .fl-table tr:nth-child(even) {
            background: #F8F8F8;
        }

        /* Responsive */

        @media (max-width: 767px) {
            .fl-table {
                display: block;
                width: 100%;
            }

            .table-wrapper:before {
                content: "Scroll horizontally >";
                display: block;
                text-align: right;
                font-size: 11px;
                color: white;
                padding: 0 0 10px;
            }

            .fl-table thead,
            .fl-table tbody,
            .fl-table thead th {
                display: block;
            }

            .fl-table thead th:last-child {
                border-bottom: none;
            }

            .fl-table thead {
                float: left;
            }

            .fl-table tbody {
                width: auto;
                position: relative;
                overflow-x: auto;
            }

            .fl-table td,
            .fl-table th {
                padding: 20px .625em .625em .625em;
                height: 60px;
                vertical-align: middle;
                box-sizing: border-box;
                overflow-x: hidden;
                overflow-y: auto;
                width: 120px;
                font-size: 13px;
                text-overflow: ellipsis;
            }

            .fl-table thead th {
                text-align: left;
                border-bottom: 1px solid #f7f7f9;
            }

            .fl-table tbody tr {
                display: table-cell;
            }

            .fl-table tbody tr:nth-child(odd) {
                background: none;
            }

            .fl-table tr:nth-child(even) {
                background: transparent;
            }

            .fl-table tr td:nth-child(odd) {
                background: #F8F8F8;
                border-right: 1px solid #E6E4E4;
            }

            .fl-table tr td:nth-child(even) {
                border-right: 1px solid #E6E4E4;
            }

            .fl-table tbody td {
                display: block;
                text-align: center;
            }
        }
    </style>
</head>
<body>
<button class="btn btn1" ><a href="./Dashboard.php"> Dashboard</a></button>

<button class="btn btn1"><a href="add-shop.php"> Add Shop</a></button>

<div class="table-wrapper">
        <table class="fl-table">
            <thead>
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
</div>
</body>
</html>