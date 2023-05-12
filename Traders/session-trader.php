
<?php
if($_SESSION['role'] != 'TRADER'){
    header("Location:../logout.php");
    exit();
}
?>