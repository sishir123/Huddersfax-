<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="stylesheet" href="Css/style2.css"> 
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link for bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>OTP Verification</title>
</head>

<body>
 <div class="form-wrap">   
 <form action="" method="post" class="form-group">
    <img src="../images/logo.png" alt="logo" class="otp-logo">
    <div class="main_text yellow_text">Huddersfax Mart</div>
    <div class="main_text">Enter an OTP from your mail</div>
    <input type="text" name="Registerhere" placeholder="Enter your code:" class="input">
    <input type="submit" name="codesubmit" value="SUBMIT" class="otp btn">
</form>
</div>
<?php
if(isset($_POST['codesubmit'])){
$code = $_POST['Registerhere']; 
$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
   
        $sqli3 = "UPDATE S_USER SET IS_VERIFIED = '1' WHERE CODE = '$code' ";
        $query3 = oci_parse($conn, $sqli3);
        oci_execute($query3);
        if($query3){
            header("Location: ../Homepage.php");
        }else{
            echo "Failed";
        }
           }
        ?>
    </body>
    </html>