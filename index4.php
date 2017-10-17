<?php

session_start();//session starts here

if(!isset($_SESSION['user_name'])) {
   header("Location:signin.php");	

}	
error_reporting(0);


	?>
	<?php

$conn = mysqli_connect("localhost","admin","M0n@rch$");
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     } 
	
	mysqli_select_db($conn,'slack');
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	
	

    $message_post=$_POST['message_post'];//here getting result from the post array after submitting the form.
	$message_post = trim($message_post);
	$message_post = stripslashes($message_post);
	$message_post = htmlspecialchars($message_post);
  
	
	$insert_channel=" INSERT INTO users_message (ch_id, messages, user_name, date) VALUES ('4', '$message_post', '$user_name', CURRENT_TIMESTAMP())"  ;

     if(mysqli_query($conn,$insert_channel))
    {
		header("Location:indexw.php");		 
        
    }

	
	
}	
?>