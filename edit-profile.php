<?php
include('./session.php');
$userid =  $_SESSION['id'];


if(isset($_POST['Submit'])){
    $username = $_POST['userName'];
    $email = $_POST['Email'];
    $phonenumber = $_POST['PhoneNumber'];
    $password = $_POST['Password'];
    $address = $_POST['Address'];
    // $userimage = $_POST['UserImage'];

    $userimage = basename($_FILES['UserImage']['name']);
        $tempname = $_FILES['UserImage']['tmp_name'];
        $folder = './userimage/' . $userimage;
        move_uploaded_file($tempname, $folder);

    $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
    //Gather id sent from crud.php page
    $updateStatus= "UPDATE S_USER SET USER_NAME ='$username', EMAIL = '$email', PHONENUMBER = '$phonenumber', PASSWORD = '$password', ADDRESS = '$address', USER_IMAGE = '$userimage'  WHERE USER_ID='$userid'";
    $queryStatus= oci_parse($conn,$updateStatus);
    oci_execute($queryStatus);
    if($queryStatus){
        
        // header('../Customer-edit-profile.php');

    }else{
        echo "Error";
    }
    

}
?>