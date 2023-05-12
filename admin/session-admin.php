<?php
if($_SESSION['role'] != 'ADMIN'){
    header("Location:../logout.php");
    exit();
}
?>