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
    <title>Document</title>
    <style>
    html, body {
        height: 100%;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(to top, #FFE799, #FFF) !important;
    }
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 400px;
        margin: 20px;
        height: 400px;
        background-color: #ffffff;
        border: 1px solid #ffffff;
        border-radius: 5px;
    }
    input{
        margin: 20px !important;
    }
    .main_text{
        font-size: 20px;
        padding: 10px;
        font-weight: bold;
    }
    .main_text.yellow_text{
        color: #FFD966;
    }
    .otp-logo{
        width: 40%;
        height: 30%;
    }
    .form-group .btn{
        background: none;
        border: 1px solid #000;
        font-family: "montserrat",sans-serif;
        padding: 6px 20px;
        min-width: 200px;
        margin: 10px;
        cursor: pointer;
        transition: color 0.4s linear;
        position: relative;
    } 

    .otp.btn:hover{
        background: #FFE799;
    }
    .otp.btn::before{
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: #000;
        z-index: -1;
        transition: transform 0.5s;
        transform-origin: 0 0;
        transition-timing-function: cubic-bezier(0.5,1.6,0.4,0.7);
}
  </style>    
</head>
<body>
    <?php
    if(isset($_POST['codesubmit'])){

    $Category_type = $_POST['Category_type'];
     $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
     $SQLI = "INSERT INTO PRODUCT_CATEGORY(CATEGORY_TYPE, STATUS, FK1_USER_ID) VALUES('$Category_type', 1 ,'$userid')";
     $queeryok = oci_parse($conn, $SQLI);
     oci_execute($queeryok);
    }

    ?>
 <div class="form-wrap">
<form method="post" class="form-group">
<img src="../../images/logo.png" alt="logo" class="otp-logo">
    <label for="exampleInputEmail1" class="form-label" >Category type</label>
    <div class="main_text">Enter Your Category Type:</div>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Category_type">
    <input type="submit" name="codesubmit" value="SUBMIT" class="otp btn">
    </form>
  </div>
 

</body>
</html>