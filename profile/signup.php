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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<link rel="icon" type="image/jpg" href="https://static8.depositphotos.com/1010751/1032/v/950/depositphotos_10323838-stock-illustration-fitness-logo.jpg">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><!-- getting the bootstrap css file for predefined components  -->
</head>


<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a style="font-weight:bold; font-family: 'Salsa'; font-size:2.5em; color:orange" class="navbar-brand" href="signup.php">Fitness</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      
	  
      <li><a role="button" style="color:white" class="btn btn-primary" href="contact.php">Contact Us</a></li>
	  
    </ul>
  </div>
</nav>


<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<center>
<br>
<br>
<br>
<h2>Sign Up</h2>



<form action="signup.php" method="post" enctype="multipart/form-data">
	
    <!--<img src="user-image.jpg" class="img-rounded responsive"   width="170" height="130"> 

	<input id="imgInp" style="margin-top:20px; margin-left:80px" type="file" name="user_image" accept="image/*" />

	<br>
	<img id="blah" src="" alt="Image Preview" height="100" width="150" />
		 
		--> 

</center>

	<div style="margin-top:50px" class="form-group">
    <label for="user">Username:</label>
    <input name="user_name" type="text" class="form-control" placeholder="Enter username" id="user" required>
  </div>
   

<div class="form-group">
    <label for="email">Email address: <?php
$user_mess="";
include 'connect.php';
	 
	 
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						
				/*		$imgFile = $_FILES['user_image']['name'];
						$tmp_dir = $_FILES['user_image']['tmp_name'];
						$imgSize = $_FILES['user_image']['size'];
						
					if($imgFile) {	
						
						$upload_dir = 'user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 50000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					 echo '<script language="javascript">';
        echo 'alert("Large: Should be less than 5MB")';
        echo '</script>';
		
				}
			}
			else{
			 echo '<script language="javascript">';
        echo 'alert("Error")';
        echo '</script>';
		
			}
					}
					
					
					else { */
			
								$userpic = "user-image.jpg";
						
				//	}					
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
		
$email = $user_email;

$default = "https://image.freepik.com/free-icon/user-image-with-black-background_318-34564.jpg";
$size = 200;	
$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
$userpic = $grav_url;
	
$insert_user="INSERT INTO users_info (id, user_pic, user_name, user_pass,  user_email, grav_image) VALUES ('1', '$userpic', '$user_name', '$user_pass', '$user_email', '1')";

    if(mysqli_query($conn,$insert_user))
    {				
				  $_SESSION['user_pic'] = $userpic;	
				  $_SESSION['chname'] = "general";
				  $_SESSION['user_name']=$user_name;
				  $_SESSION['user_email']=$user_email;
				  $insert1_channel=mysqli_query($conn," INSERT INTO users_channel (id, channels, user_email) VALUES ('1', 'general', '$user_email')")  ;
				  
					$r103=mysqli_query($conn,"select  *from public_channels");
					while($r203=mysqli_fetch_array($r103))
					{
					
					$pchannel=$r203['p_channel'];
					$invitor=$r203['invitor'];
					$insert2_channel=mysqli_query($conn," INSERT INTO unique_channel (channels1, users_email, invitor) VALUES ('$pchannel', '$user_email', '$invitor')")  ;
					$_SESSION['page_num'] = 1;
					
					}

					include 'class.phpmailer.php';
					require_once 'class.smtp.php';
					$length = 30;
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	
	$useremail=$_SESSION['user_email'];
	$update_insert=mysqli_query($conn," UPDATE users_info SET two_string = '$str' WHERE user_email = '$useremail'")  ;
					
					$return_arrfinal = array();
     $status_array['status'] = '1';
     $mail = new PHPMailer();
     $toarraymail=$user_email;
     $mail->SMTPDebug = 1;                              // Enable verbose debug output
     $mail->Port = '587';
     $mail->isSMTP();                                      // Set mailer to use SMTP // Specify main and backup SMTP servers                                    // Set mailer to use SMTP
     $mail->Host = gethostbyname('smtp.gmail.com');  // Specify main and backup SMTP servers
     $mail->SMTPAuth = false; // Authentication must be disabled

     $mail->Username = 'ghrishi29@gmail.com';
     $mail->Password = '';
     $mail->SMTPSecure= false;


     $mail->setFrom("ghrishi29@gmail.com","Fitness");
     $mail->AddAddress($toarraymail);     // Add a recipient
     // Optional name
     $mail->isHTML(true);                                  // Set email format to HTML
		
     $mail->Subject = 'User Verification For Fitness.com';
     $mail->Body    =" Hi, <br> Your Authorization Code: $str";
     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

     if(!$mail->Send()){
       echo "false";
       echo 'Mailer Error: ' . $mail->ErrorInfo;
       return false;
     }else{
       header("Location:mail.php");
       
     }
     
				  
       //header("Location:index.php");	

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
  
  <div class="g-recaptcha" data-sitekey="6LdmwzwUAAAAAGQhutDN6byzchcb95bddlCdNJD7"></div>
		<br>
			<div id="cando" style="font-weight:bold;" ></div>
		<br>
							
  <button type="submit" value="submit3" name="submit3" onclick="return Validate()"  class="btn btn-default">Submit</button>
</form>


</div>
</div>
</div>

<script>

function Validate() {

if (grecaptcha.getResponse() == ""){
    document.getElementById("cando").innerHTML = "Captcha Needed!";
	return false;
} else {
    document.getElementById("cando").innerHTML = "";
	return true;
}

	}	
	


function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });	
	
</script>
</body>

</html>