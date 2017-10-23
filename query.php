<?php 

	if($_GET['chid'] && $_GET['chname'] ) { // for workspace.php page
 
		$_SESSION['chid']=$_GET['chid'];
        $_SESSION['chname']=$_GET['chname'];
				
		
	}
	
	if(isset($_POST['submit2'])) { 
	
	$message_post=$_POST['message_post'];//here getting result from the post array after submitting the form.
	
  
	$user_name=$_SESSION['user_name'];
	$ch_id=$_SESSION['chid'];
	
	$insert_channel=mysqli_query($conn," INSERT INTO users_message (ch_id, messages, user_name, date) VALUES ('$ch_id', '$message_post', '$user_name', CURRENT_TIMESTAMP())")  ;

     

	}
	
	
	if(isset($_POST['submit'])) { // for workspace.php page
 
		$search = test_input($_POST["search"]);
		$r1=mysqli_query($conn,"select workspace from users where workspace='".$search."'");
		$r2=mysqli_fetch_array($r1);
	
		
	}	

	if(isset($_POST['submit1'])) {  //for signin.php
		
		$_SESSION['user_email']=$_POST['user_email'];
		$_SESSION['user_pass']=$_POST['user_pass'];	
		
		$r1=mysqli_query($conn,"select user_email,user_pass from users_info where user_email='".$_SESSION['user_email']."' and user_pass='".$_SESSION['user_pass']."'");
        $r2=mysqli_fetch_array($r1);
   
			if($r2['user_email']==$_SESSION['user_email'] && $r2['user_pass']==$_SESSION['user_pass']) //check for valid email and password
				{
          
					$result=mysqli_query($conn,"select user_name from users_info where user_email='".$_SESSION['user_email']."' and user_pass='".$_SESSION['user_pass']."'");
					 
					$row=mysqli_fetch_array($result);
					$_SESSION['chname'] = "general";
					$_SESSION['user_name'] = $row['user_name'];
					header("Location:index.php"); //success
	
				}

	}

function test_input($data) { // function for mysql injections
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;	
  
}
?>