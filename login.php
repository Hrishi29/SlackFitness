<?php

session_start();//session starts here


if(!isset($_SESSION['workspace'])){
   header("Location:workspace.php");
}

error_reporting(0);
?>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
$_SESSION['user_email']=$_POST['user_email'];
$_SESSION['user_pass']=$_POST['user_pass'];	
	
	
	
  
  
	$conn = mysqli_connect("localhost","root","");
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     } 
	
	mysqli_select_db($conn,'slack');
	
	$r1=mysqli_query($conn,"select user_email,user_pass from users where user_email='".$_SESSION['user_email']."' and user_pass='".$_SESSION['user_pass']."'");
    $r2=mysqli_fetch_array($r1);
	
	 if($r2['user_email']==$_SESSION['user_email'] && $r2['user_pass']==$_SESSION['user_pass'])
	
	{
		
	
	echo "welcome!";
	}
	
	else 
	{
	
	header("Location: signin.php");
	
	
	
	
	}
	
$conn->close();
}

?>