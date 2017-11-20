<?php

session_start();//session starts here


if(!isset($_SESSION['workspace'])){ //only users within workspace
   header("Location:workspace.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Slack</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><!-- getting the bootstrap css file for predefined components  -->
</head>


<body>


<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<center>

<h2>Sign Up</h2>

<?php

if(isset($_POST['search_submit'])) {
	
	include 'connect.php';
	
	$profile_mess=mysqli_real_escape_string($conn,test_input($_POST['search_profile']));
	
	$profile1=mysqli_query($conn,"select  * from users_info where user_name='".$profile_mess."'");
	
	$profile2=mysqli_fetch_array($profile1) {
		
	
	}
	?>
	
	
	<img src="user_images/<?php ?> class="img-rounded responsive"   width="170" height="130"> 

	
	
	<?php
	
	function test_input($data) { // function for mysql injections
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;	

	
}

?>


</center>

</body>
</html>