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
						
						$user_pass=$_POST['pass'];
						$user_passw=$_POST['passw'];
						if ($user_pass!=$user_passw)
							{
								$user_mess="Passwords Do Not Match!";
							}
						
						else {
							
					$user_email=$_POST['user_email'];//same	
					$user_name=$_POST['user_name'];
					$check_email_query="select * from users_info WHERE user_email='$user_email'";
					$run_query=mysqli_query($conn,$check_email_query);

    
					
					
					if(mysqli_num_rows($run_query)>0)
    {
	
?>Email Address already exists! Please try another.<?php	
		
    }
	
else {
	
	$user_email=$_POST['user_email'];
	$user_pass=$_POST['pass'];
	$user_name=$_POST['user_name'];
	
$insert_user="INSERT INTO users_info (id, user_name, user_pass,  user_email) VALUES ('1', '$user_name', '$user_pass', '$user_email')";

    if(mysqli_query($conn,$insert_user))
    {
				  $_SESSION['chname'] = "general";
				  $_SESSION['user_name']=$user_name;
				  
        echo '<script language="javascript">';
        echo 'alert("Successfully Registered"); location.href="index.php"';
        echo '</script>';
    }

	


}	
					}
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