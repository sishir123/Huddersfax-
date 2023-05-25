<?php
include('../session.php');
include('./session-trader.php');

$session_var = $_SESSION['id'];
$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
$SQLI = "SELECT * FROM SHOP WHERE FK1_USER_ID = '$session_var'";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Css/style.css" />
    <title>Document</title>
    <style>
    * {
  box-sizing: border-box;
  margin: 0px;
  padding: 0px;
}

html {
  height: 100%;
  scrollbar-width: none;
  -ms-overflow-style: none;
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

a {
  text-decoration: none;
}

#container {
 
  margin: 100px auto;
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

/*  
.form-wrap button:hover {
  background-color: #915647;
  color: black;
}

.form-wrap .button-text {
  font-size: 13px;
  margin-top: 20px;
} */

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

.logo {
  width: 10%;
  height: 7.4%;
  position: fixed;
  left: 0px;
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

/* Buttons */
/* Buttons */
.btn{
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

.btn:hover{
  color: #fff;
}
.btn::before{
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
.btn1::before{
  transform: scaleX(0);
}
.btn2::before{
  transform: scaleY(0);
}
.btn1:hover::before{
  transform: scaleX(1);
}
.btn2:hover::before{
  transform: scaleY(1);
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
    </style>
</head>
<body>
<button class="btn btn1"><a href="Manage-offers.php">Back to Offer</a></button>
    <?php
    if(isset($_POST['codesubmit'])){
    $Offerstartdate = $_POST['Offer-start-date'];
    $Offerenddate = $_POST['Offer-end-date'];
    $Offerpercentage = $_POST['Offer-percentage'];
    $product = $_POST['prod'];
     $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
     $SQLI = "INSERT INTO OFFER(OFFER_START_DATE, OFFER_END_DATE, OFFER_PERCENTAGE,PRODUCT_ID) VALUES('$Offerstartdate', '$Offerenddate','$Offerpercentage',$product)";
     $queeryok = oci_parse($conn, $SQLI);
     oci_execute($queeryok);
     echo "Offer created successfully";
    }
    ?>

    <h1 class="hey">Add Offers</h1>
<div id="container">
    <div class="form-wrap">
<form method="post">
<div class="form-group">
    <label for="exampleInputEmail1" class="form-label" >Offer Start Date</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Offer-start-date">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">Offer End Date</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Offer-end-date">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">Offer Percentage</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Offer-percentage">
  </div>

  <div class="form-group">
  <label for="">For Products</label>
  <select name="prod">
    <?php
    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    $SQLI3 = "SELECT PRODUCT_NAME, PRODUCT_ID FROM PRODUCT, SHOP WHERE PRODUCT.FK1_SHOP_ID = SHOP.SHOP_ID AND SHOP.FK1_USER_ID = '$session_var'";
    $SQLI4 =oci_parse($conn, $SQLI3);
    oci_execute($SQLI4);
    while($rows = oci_fetch_array($SQLI4)){
      $pid = $rows[1];
      $pname = $rows[0];
      ?>
<option value = "<?php echo $pid;?>"><?php
echo $pname;
?></option>';
      <?php
    }
    
    ?>
</select>
</div>
  <input type="submit" class="btn" name="codesubmit">Submit</button>
</form>
</div>
</div>
</body>
</html>