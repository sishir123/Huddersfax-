
<?php
session_start();
if(!isset($_SESSION['user']) && !isset($_SESSION['email']) && !isset($_SESSION['role'])){
    header("Location:./logout.php");
    exit();
}
?>