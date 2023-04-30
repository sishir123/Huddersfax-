<?php $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe'); if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit; } else {
   print "Connected to Oracle!"; } 
    oci_close($conn); 
    ?>


<?php 
	// $conn=oci_connect("ADMIN","Nepal123#","localhost/xe");
	// If (!$conn)
	// 	echo 'Failed to connect to Oracle';
	// else 
	// 	echo 'Succesfully connected with Oracle DB';
?>