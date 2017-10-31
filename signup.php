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
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><!-- getting the bootstrap css file for predefined components  -->
</head>


<body>


<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<center>

<h2>Sign Up</h2>

<img src="user-image.jpg" class="img-rounded responsive" name="user_image"  width="170" height="130"> 

<input style="margin-top:20px; margin-left:80px" type="file" name="user_image" accept="image/*" />

</center>
<form action="signup.php" method="post">
	<div style="margin-top:50px" class="form-group">
    <label for="user">Username:</label>
    <input name="user_name" type="text" class="form-control" placeholder="Enter username" id="user" required>
  </div>
   

<div class="form-group">
    <label for="email">Email address: <?php
$user_mess="";
include 'connect.php';
	 
	 
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						
						$user_pass=mysqli_real_escape_string($conn,test_input($_POST['pass']));
						$user_passw=mysqli_real_escape_string($conn,test_input($_POST['passw']));
						if ($user_pass!=$user_passw)
							{
								$user_mess="Passwords Do Not Match!";
							}
						
						else {
							
					$user_email=mysqli_real_escape_string($conn,test_input($_POST['user_email']));//same	
					$user_name=mysqli_real_escape_string($conn,test_input($_POST['user_name']));
					$check_email_query="select * from users_info WHERE user_email='$user_email'";
					$run_query=mysqli_query($conn,$check_email_query);

    
					
					
					if(mysqli_num_rows($run_query)>0)
    {
	
?>Email Address already exists! Please try another.<?php	
		
    }
	
else {
	
	
$insert_user="INSERT INTO users_info (id, user_name, user_pass,  user_email) VALUES ('1', '$user_name', '$user_pass', '$user_email')";

    if(mysqli_query($conn,$insert_user))
    {
				  $_SESSION['chname'] = "general";
				  $_SESSION['user_name']=$user_name;
				  $_SESSION['user_email']=$user_email;
				  $insert1_channel=mysqli_query($conn," INSERT INTO users_channel (id, channels, user_email) VALUES ('1', 'general', '$user_email')")  ;
				  
					$r103=mysqli_query($conn,"select  *from public_channels");
					while($r203=mysqli_fetch_array($r103))
					{
	 
					$pchannel=$r203['p_channel'];
					$invitor=$r203['invitor'];
					$insert2_channel=mysqli_query($conn," INSERT INTO unique_channel (channels1, users_email, invitor) VALUES ('$pchannel', '$user_email', '$user_email')")  ;

					}

				  
        echo '<script language="javascript">';
        echo 'alert("Successfully Registered"); location.href="index.php"';
        echo '</script>';
    }

	


}	
					}
					} 
	
function test_input($data) { // function for mysql injections
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;	

}
	
	$conn->close();
	
	
	

?>

</label>
    <input name="user_email" type="email" placeholder="Enter email" class="form-control" id="email" required>
  </div>

  
 
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input name="pass" type="password" placeholder="Enter password" class="form-control" id="pwd" required>
  </div>
  <div class="form-group">
    <label for="rpwd">Confirm Password:<?php echo $user_mess; ?></label>
    <input name="passw" type="password" placeholder="Confirm password" class="form-control" id="rpwd" required>
  </div>
  <button type="submit" value="submit3" name="submit3"  class="btn btn-default">Submit</button>
</form>


</div>
</div>
</div>


</body>

</html>