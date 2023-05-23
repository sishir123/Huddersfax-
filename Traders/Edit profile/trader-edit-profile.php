<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
</head>
<title>Edit profile</title>
</head>

<body>
   

    <!-- Edit profile text -->
    <div class="edit-profile-text">
        <h3>Edit your Profile</h3>
    </div>
    <button><a href="../trader-dash.php"> Dashboard</a></button>
    <?php
    $profile = $_SESSION['id'];
    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    $SQLI = "SELECT * FROM S_USER WHERE USER_ID = '$profile'";
    $queeryok = oci_parse($conn, $SQLI); //Check whether table is there or not
    oci_execute($queeryok);  //If yes then execute

    $update = oci_fetch_array($queeryok);
    ?>

<?php



echo '<form method="POST" action="./edit-profile.php?id='.$profile.'">';
?>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="userName"   value="<?php echo $update['USER_NAME']; ?>">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Email"  value="<?php echo $update['EMAIL']; ?>">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone Number</label>
    <input type="text" class="form-control" name="PhoneNumber"  value="<?php echo $update['PHONENUMBER']; ?>">
    <div id="emailHelp" class="form-text"></div>
  </div>
  
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Password</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Password"   value="<?php echo $update['PASSWORD']; ?>">
    
  </div>
  
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Address"   value="<?php echo $update['ADDRESS']; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" >User image</label>
    <input type="file" class="form-control" id="exampleInputPassword1" name="UserImage">
  </div>
  
  <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
</form>




</body>

</html>