<?php

session_start();//session starts here

if(!isset($_SESSION['user_name'])) {
   header("Location:signin.php");	

}	
error_reporting(0);


	?>
	<?php

$conn = mysqli_connect("localhost","root","");
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     } 
	
	mysqli_select_db($conn,'slack');
	
	if(isset($_POST['submit']))
{
    $message_post=$_POST['message_post'];//here getting result from the post array after submitting the form.
	$user_name=$_SESSION['user_name'];
	
	
	$insert_channel=" INSERT INTO users_message (ch_id, messages, user_name, date) VALUES ('3', '$message_post', '$user_name', CURRENT_TIMESTAMP())"  ;

     if(mysqli_query($conn,$insert_channel))
    {
		header("Location:indexc.php");		 
        
    }

	
	
}	
?>