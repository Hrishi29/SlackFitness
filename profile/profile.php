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
    <link rel="icon" type="image/jpg" href="https://static8.depositphotos.com/1010751/1032/v/950/depositphotos_10323838-stock-illustration-fitness-logo.jpg">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><!-- getting the bootstrap css file for predefined components  -->
</head>


<body>


<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<center>


<?php

if(isset($_POST['search_submit'])) {
	
	include 'connect.php';
	
	$profile_mess=mysqli_real_escape_string($conn,test_input($_POST['search_profile']));
	
	$profile1=mysqli_query($conn,"select  * from users_info where user_name='".$profile_mess."'");
	
	if($profile1){
	
	$profile2=mysqli_fetch_array($profile1) ;
		
	
	
	?>
	
	<h1 style="font-family: 'Salsa'"><?php echo $profile2['user_name'];?></h2>

	<?php
	
	if($profile2['user_pic']=="user-image.jpg")
		
		{
	
	?>
	
	<img src="user-image.jpg" class="img-rounded responsive"   width="200" height="200" alt="profile_picture"> 

	<?php
	
		}
		
		else if($profile2['grav_image']==1){
			
	?>

	<img src="<?php echo $profile2['user_pic'];?>" class="img-rounded responsive" alt="profile_picture"  width="200" height="200"> 
	
	
	<?php
		}
		else
		{

	?>
	
	<img src="user_images/<?php echo $profile2['user_pic'];?>" class="img-rounded responsive" alt="profile_picture"  width="200" height="200"> 
	
	
	<?php
	
		}
	
	?>
	<br>
	<br>
	<?php
	
	
	if (preg_match("/^[S-Zs-z]+/", $profile2['user_name'] ))
	{
	
	?>
	
	
	<img src="user_ratings/1.png" class="img-rounded responsive" alt="profile_picture"  width="150" height="50"> 

	
	<?php
	
	}
	
	
	
	if (preg_match("/^[A-Ea-e]+/", $profile2['user_name'] ))
	{
	
	?>
	
	
	<img src="user_ratings/2.png" class="img-rounded responsive" alt="profile_picture"  width="150" height="50"> 

	
	<?php
	
	}
	
	if (preg_match("/^[F-Rf-r]+/", $profile2['user_name'] ))
	{
	
	?>
	
	
	<img src="user_ratings/3.png" class="img-rounded responsive" alt="profile_picture"  width="150" height="50"> 

	
	<?php
	
	}
	
	?>
	
	
	
	
	
	
	<br>
	<p><h2 style="font-family: 'Salsa'">Username:</h2><span style="margin-left: 10px; font-family: 'Patua One'; font-size:2em; font-weight:bold"><?php echo $profile2['user_name'];?></span></p>
	
	<br>
	
	
	<p><h2 style="font-family: 'Salsa'">Email Id:</h2><span style="margin-left: 10px; font-family: 'Patua One'; font-size:2em; font-weight:bold"><?php echo $profile2['user_email'];?></span></p>	
	<br>
	
	
	<p><h2 style="font-family: 'Salsa'">Number of Posts:</h2><span style="font-family: 'Patua One'; font-size:2em; font-weight:bold"><?php 
	
	$insert_posts = mysqli_query($conn,"select  * from users_message where user_name='".$profile_mess."'");
	
	if($insert_posts){	
											// Return the number of rows in result set
							$rowcount=mysqli_num_rows($insert_posts);
						    echo $rowcount;
							
	
					  }

			else{?>0<?php }?></span></p>	
	<br>
	
	
	<p><h2 style="font-family: 'Salsa'">Number of Positive Reactions:</h2><span style="font-family: 'Patua One'; font-size:2em; font-weight:bold"><?php 
	
	$insert_posts1 = mysqli_query($conn,"select  thumbsup from reactions where user_email='".$profile2['user_email']."' and thumbsup=1");
	
	if($insert_posts1){	
											// Return the number of rows in result set
							$rowcount1=mysqli_num_rows($insert_posts1);
						    echo $rowcount1;
							
	
					  }

			else{?>0<?php }?></span></p>	
	<br>
	
	<p><h2 style="font-family: 'Salsa'">Number of Negative Reactions:</h2><span style="font-family: 'Patua One'; font-size:2em; font-weight:bold"><?php 
	
	$insert_posts2 = mysqli_query($conn,"select  thumbsdown from reactions where user_email='".$profile2['user_email']."' and thumbsdown=-1");
	
	if($insert_posts2){	
											// Return the number of rows in result set
							$rowcount2=mysqli_num_rows($insert_posts2);
						    echo $rowcount2;
							
	
					  }

			else{?>0<?php }?></span></p>	
	<br>
	
	<p><h2 style="font-family: 'Salsa'">Channels Subscribed To:</h2><span style="font-family: 'Patua One'; font-size:2em; font-weight:bold"><?php 
	
	$insert_posts3 = mysqli_query($conn,"select  channels from users_channel where user_email='".$profile2['user_email']."'");
	
			while($insert_posts4=mysqli_fetch_array($insert_posts3))
						{
							echo '#';
							echo $insert_posts4['channels'];
							echo '<br>';
	
					  }

			?></span></p>	
	<br>
	
	<p><h2 style="font-family: 'Salsa'">Private Channels Owned:</h2><span style="font-family: 'Patua One'; font-size:2em; font-weight:bold"><?php 
	
	$insert_posts5 = mysqli_query($conn,"select  channel_name from private_channel where user_email='".$profile2['user_email']."'");
	
	if($insert_posts5){	
			while($insert_posts6=mysqli_fetch_array($insert_posts5))
						{
							echo '#';
							echo $insert_posts6['channel_name'];
							echo '<br>';
	
					  }

					  
	}
			if($insert_posts5==""){?>None<?php }?></span></p>	
	<br>
	
	
	<?php
	
	
	}
	
}
	function test_input($data) { // function for mysql injections
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;	

	}
	
	


?>


<a href="index.php" style="margin-left:2px" class="btn btn-primary btn-lg" role="button">Back</a>
	
	<br>

</center>

</body>
</html>