<?php
session_start();
if(isset($_SESSION['id'])){
    $userid = $_SESSION['id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css link -->
    <link href="../../Css/style.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
</head>
<title>Edit profile</title>
<style>
    * {
  box-sizing: border-box;
  margin: 0px;
  padding: 0px;
}



body {
  font-family: 'Raleway', sans-serif;
  line-height: 1.8;
  background: #FFE799;
  height: auto;
  
}



body::-webkit-scrollbar {
  display: none;
}



#container {
  margin: 40px auto;
  max-width: 400px;
  padding-right: 50px;
}

.form-wrap {
  padding: 15px 25px;
  color: #333;
  
}

.form-wrap h1,
.form-wrap p {
  text-align: center;
}

.form-wrap .form-group {
  margin-top: 15px;
}

.form-wrap .form-group label {
  display: block;
  color: #666;
}

.form-wrap .form-group input {
  width: 300px;
  padding: 10px;
  border: #ddd 1px solid;
  border-radius: 5px;
}

 .form-wrap button {
  width: 300px;
  /* background-color: #a28089; */
  padding: 10px;
  margin-top: 20px;
  /* color: white; */
  cursor: pointer;
}



.navigation {
  display: flex;
  flex-flow: row wrap;
  justify-content: flex-end;
  list-style: none;
  margin: 0;
  background: #a28089;
}

.navigation a {
  text-decoration: none;
  display: block;
  padding: 1em;
  color: white;
}

.navigation a:hover {
  background: #915647;
}

@media all and (max-width: 800px) {
  .navigation {
    justify-content: space-around;
  }
}

@media all and (max-width: 600px) {
  .navigation {
    flex-flow: column wrap;
    padding: 0;
  }

  .navigation a {
    text-align: center;
    padding: 10px;
    border-top: 1px solid rgba(255, 255, 255, 0.3);
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  }

  .navigation li:last-of-type a {
    border-bottom: none;
  }
}



.card-img-top {
  width: 100%;
  height: 200px;
  object-fit: contain;
}

.admin_image {
  width: 100px;
  object-fit: contain;
}

/* For login here and register here */

.login-registration{
  text-decoration: none;
  color: #000;
  margin-right: 50px;;
}
.form{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.otp_root {
  width: 400px;
  height: 400px;
  background-color: #f2f2f2;
  border: 1px solid #ccc;
  border-radius: 5px;
}
  .hey{
    text-align: center;
    padding-top: 40px;
    padding-right: 80px;
  }
  .amg-wrapper{
    margin-left: 90px;
    /* margin-top: 40px; */

  }
  .amg{
    border-radius: 50%;
  }
  .blm{
    color: #FFE799;
    text-decoration: none;
  }
  .btn-div{
    display: flex;
  }
  
    </style>
</head>

<body>
   

    <!-- Edit profile text -->
    <div class="edit-profile-text">
        <h3>Edit your Profile</h3>
    </div>
    <div class="btn-div">
    <button class="btn btn-1"><a href="../Dashboard.php" class="blm"> Dashboard</a></button>
    </div>
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

<div id="container">
    <div class="form-wrap">
    <?php
     $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
     $SQlii = "SELECT * FROM S_USER WHERE USER_ID = $userid";
     $QURYY = oci_parse($conn, $SQlii);
     oci_execute($QURYY);
    while ($value = oci_fetch_array($QURYY)) {


    ?>
    
      <div class="amg-wrapper">
    <img src="../../userimage/<?php echo  $value['USER_IMAGE']; ?>" alt="No image Uploaded" height="100px" width="100px" class="amg">
    </div>
    
    <?php
    
    }
    
    ?>
    <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">User Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="userName"   value="<?php echo $update['USER_NAME']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Email"  value="<?php echo $update['EMAIL']; ?>">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">Phone Number</label>
    <input type="text" class="form-control" name="PhoneNumber"  value="<?php echo $update['PHONENUMBER']; ?>">
    <div id="emailHelp" class="form-text"></div>
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">Password</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Password"   value="<?php echo $update['PASSWORD']; ?>">
    
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">Address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Address"   value="<?php echo $update['ADDRESS']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label" >User image</label>
    <input type="file" class="form-control" id="exampleInputPassword1" name="UserImage">
  </div>
  
  <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
</form>




</body>

</html>