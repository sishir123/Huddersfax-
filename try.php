<?php 
session_start();
if(isset($_SESSION['id'])){
    $userid = $_SESSION['id']; 
}

if(isset($_POST['submit-try'])){
  $text= $_POST['try-text'];
  echo $text;
}
 if(isset($_POST['Submit-rate'])){
  if(isset($_POST['rate'])){
  $Ratingnum = $_POST['rate'];
  $prodid = $_POST['productid'];
  $Reviews = $_POST['review'];
  $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
  $SQLI = "INSERT INTO REVIEW(REVIEW_FEEDBACK,REVIEW_RATING,FK1_PRODUCT_ID,FK2_USER_ID) values('$Reviews','$Ratingnum','$prodid','$userid')";
  $executer = oci_parse($conn, $SQLI);
  oci_execute($executer);

  if($executer){
    echo '<script>alert("Thanks for your Feedback")</script>';
    if(1){
        header('Location:'. $_SERVER["HTTP_REFERER"]);
    }
  }
}

 }
 
 ?>

