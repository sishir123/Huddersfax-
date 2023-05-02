<!--Connection-->
<?php
@include 'Connect/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="Css/style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form styling</title>
</head>
<body>
    <div id="container">

        <div class="form-wrap">
            <h1>Welcome. We make shopping easy for you.</h1>
            <!-- <p>It's free and only takes a minute</p> -->
            
            <form method="POST">


            <div class="form-group">
                <label for="first-name"></label>
                <input type="text" placeholder="User name" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" placeholder="Password" name="password" id="password">
            </div>
            <input type="submit" value="submit" class="btn btn1" name="submit">
            <h4>Don't have a Account?</h4>
            <a href="registration.php">Register Here</a><br>
            <select name="categories-dropdown" id="categories">
                    <option selected disabled value="">Role</option>
                    <option value="">Customer</option>
                    <option value="">Trader</option>
                    <option value="">Admin</option>
                </select>
            </form>

        </div>

        <?php
        if(isset($_POST['submit'])){
            $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
            $username = $_POST['username'];
            $password = $_POST['password'];
            $Log = "SELECT * FROM S_USER WHERE USER_NAME = '$username' AND PASSWORD = '$password' ";
            $queryplz = oci_parse($conn, $Log);
            oci_execute($queryplz);

            if(oci_execute($queryplz)){
                $value = oci_fetch_array($queryplz);

                if($value['USER_ROLE'] == 'USER' ) {
                    echo "<script>window.location.href = '../Homepage.php';</script>";
                   
                
                }else{
                    echo " User not found  ";
                }
            }else{
                echo " Excecute failed ";
            }
            
        } 
        
         
        ?>

    </div>
</body>

</html>