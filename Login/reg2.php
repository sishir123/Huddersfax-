<form action="" method="post">
 <input type="text" name="Registerhere" placeholder="Enter your code:">
 <input type="submit" name="codesubmit" value="submit">
</form>

<?php
if(isset($_POST['codesubmit'])){
$code = $_POST['Registerhere']; 
$conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
   
        $sqli3 = "UPDATE S_USER SET IS_VERIFIED = '1' WHERE CODE = '$code' ";
        $query3 = oci_parse($conn, $sqli3);
        oci_execute($query3);
        if($query3){
            header("Location: ../Homepage.php");
        }else{
            echo "Failed";
        }
           }
        ?>