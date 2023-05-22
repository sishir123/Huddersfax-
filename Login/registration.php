
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="stylesheet" href="Css/style2.css"> -->
    <link href="./Css/style2.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link for bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Form styling</title>
</head>

<body>
    <?php
    
    $username_error = " ";
    $password_error = " ";
    $email_error = " ";
    $address_error = " ";
    $phonenumber_error = " ";

    ?>
    <div id="container">
        
        <?php
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $PhoneNumber = $_POST['PhoneNumber'];

            // For username
            $username_error = " ";
            if (!empty($username)) {
                if (strlen($username) >= 6) {
                    if (ctype_alpha($username)) {
                        $validusername = $username;
                    } else {
                        $username_error = "<b>Username cannot be a number.</b>";
                    }
                } else {
                    $username_error = "<b>Username is less than 6";
                }
            } else {
                $username_error = "<b>Your Username is empty</b> ";
            }

        ?>

            <?php
            //For password
            if (!empty($password)) {
                if (preg_match('/[a-z]/', $password)) {
                    if (preg_match('/[A-Z]/', $password)) {
                        if (preg_match('/[0-9]/', $password)) {
                            $validpassword = $password;
                        } else {
                            $password_error =  "<b>Insert numeric value in password</b> ";
                        }
                    } else {
                        $password_error =  "<b>Insert any uppercase value in password</b> ";
                    }
                } else {
                    $password_error =  "<b>Insert any lowercase value in password</b> ";
                }
            } else {
                $password_error =  "<b>Your Password is empty</b> ";
            }

            ?>
            <?php
            //For email
            if (!empty($email)) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $validemail = $email;
                } else {
                    $email_error = "<b>Invalid Email</b> </br>";
                }
            } else {
                $email_error = "<b>Your Email is empty</b> </br>";
            }
            ?>

            <!-- For address -->
            <?php
            if(!empty($address)){

            }else{
                $address_error = "<b>Your Address is empty</b><br>";
            }
            ?>

            <!-- For Phone number -->
            <?php
            if(!empty($PhoneNumber)){

            }else{
                $phonenumber_error =  "<b>Your Contact Number is empty</b>";
            }
            ?>

            <!-- Inserting the data to db form registration form -->
        <?php
        if ($username_error == " " && $password_error == " " && $email_error == " " && $address_error == " " && $phonenumber_error == " "){

            // Verification code generator
            $v_code = bin2hex(random_bytes(3)); 
            $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
            $SQLI = "INSERT INTO S_USER(USER_ROLE, USER_NAME, EMAIL, PHONENUMBER, PASSWORD, ADDRESS, CODE) VALUES('USER', '$username','$email', '$PhoneNumber','$password','$address','$v_code')";
            $queeryok = oci_parse($conn, $SQLI);
            oci_execute($queeryok);

            if ($queeryok) {
                
                
                $to = $email;
                $subject = 'Huddersfax Verification';
                $message = 'Hello Sir/Mam ! Thank you for choosing us. Use this code for registration : '.$v_code;
                $headers = "From: huddersfaxmart@gmail.com";
                $mail_sent = mail($to, $subject, $message, $headers);
                if ($mail_sent == true) {
                    echo "Mail Sent";
                } else {
                    echo "Mail failed";
                }
                echo "Registration Success";
                header("Location: ./reg2.php");
            } else {
                echo " failed ";
            }
        }
    }
        ?>

<div class="form-wrap">
    
            <h1>Welcome. We make shopping easy for you.</h1>
            <!-- <p>It's free and only takes a minute</p> -->
            
            <form action="" method="POSt">
                <div class="form-group">
                    <?php
                    if (isset($error)) {
                        foreach ($error as $error) {
                            echo '<span class="error-msg">' . $error . '</span>';
                        }
                    }
                    ?>
                    <!-- <label for="first-name"></label> -->
                    <input type="text" placeholder="User name" name="username" id="username" value="<?php if (isset($_POST['username']))
                                                                                                        echo $_POST['username']; ?>">
                                                                                                        <?php echo $username_error; ?>

                    <div class="form-group">
                        <!-- <label for="password">Password</label> -->
                        <input type="password" placeholder="Password" name="password" id="password" value="<?php if (isset($_POST['password']))
                                                                                                                echo $_POST['password']; ?>">
                                                                                                                <?php echo $password_error; ?>
                    </div>

                    <div class="form-group">
                        <!-- <label for="email">Email</label> -->
                        <input type="email" placeholder="Email" name="email" id="email" value="<?php if (isset($_POST['email']))
                                                                                                    echo $_POST['email']; ?>">
                                                                                                     <?php echo $email_error ; ?>
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <!-- <label for="Address">Address</label> -->
                        <input type="text" placeholder="Address" name="address" id="address" value="<?php if (isset($_POST['address']))
                                                                                                        echo $_POST['address']; ?>">
                                                                                                         <?php echo $address_error ; ?>
                                                                                                        
                    </div>

                    <!-- Phone number -->
                    <div class="form-group">
                        <!-- <label for="PhoneNumber">Phone Number</label> -->
                        <input type="text" placeholder="PhoneNumber" name="PhoneNumber" id="PhoneNumber" value="<?php if (isset($_POST['PhoneNumber'])) echo $_POST['PhoneNumber']; ?>">
                        <?php echo $phonenumber_error ; ?>

                    </div>

                    <!-- Checkbox -->
                    
                    <input type="checkbox" name="terms" value="accepted"> 

                    <p>I accept the terms and conditions</p>
                
              
                    <!-- Submit -->
                    <input type="submit" value="Submit" class="btn btn1" name="submit">
                    <h5>Already have a account?</h5>
                    <a href="login.php" class="login-registration">Login here</a>
                    <a href="../Login/reg-tra.php" class="">Register as Trader</a>
            </form>

        </div>


    </div>
    </div>
</body>

</html>