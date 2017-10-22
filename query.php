<?php 

	
	

	
	
	
	if(isset($_POST['submit'])) { // for workspace.php page
 
		$search = test_input($_POST["search"]);
		
	}	




function test_input($data) { // function for mysql injections
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;	
  
}
?>