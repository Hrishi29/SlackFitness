<?php 

	if(isset($_GET['chname']) ) { // for index.php page for login into respective channesla
 
		
        $_SESSION['chname']=mysqli_real_escape_string($conn,test_input($_GET['chname']));
				
		
	}
	
	 
	
	
	
	if(isset($_GET['pagenum']) ) { // for index.php page for login into respective channesla
 
		
        $_SESSION['page_num']=mysqli_real_escape_string($conn,test_input($_GET['pagenum']));
		 
				
		
	}
	

	
	if(isset($_POST['channel_archive1'])) {  // inserting channel status
		
		$archive_status = $_SESSION['chname'];
		$insert_status= mysqli_query($conn," INSERT INTO archive (archive_channel, channels) VALUES ('archive', '$archive_status')")  ;
    		echo '<script language="javascript">';
        echo ' location.href="index.php"';
        echo '</script>';
		
		
	}
	
	if(isset($_POST['channel_archive2'])) {  // inserting channel status
		
		$archive_status = $_SESSION['chname'];
		$insert_status= mysqli_query($conn," INSERT INTO archive (archive_channel, channels) VALUES ('unarchive', '$archive_status')")  ;
    		
			echo '<script language="javascript">';
        echo 'location.href="index.php"';
        echo '</script>';
		
	}
	
	
	
	if(isset($_POST['th_up'])) { // for index.php after posting the reactions for thumbs up
	
	$message_id=mysqli_real_escape_string($conn,test_input($_POST['th_up']));//here getting result from the post array after submitting the form.
	  
  
	$user_email=$_SESSION['user_email'];
	
	
	$retreiv=mysqli_query($conn,"select  * from reactions where user_email='".$user_email."' and mess_id='".$message_id."' and thumbsup=1 and reply_id=0");
	$retreive=mysqli_fetch_array($retreiv);
	
	

    
					
					
					if($retreive['thumbsup']==1)
    {
		 
			
    }
	
	
	
	
	else {
		
	 	
	
	 
		
			$insert_reaction= mysqli_query($conn," INSERT INTO reactions (mess_id, user_email, thumbsup, thumbsdown, reply_id) VALUES ('$message_id', '$user_email', '1', '0', '0')")  ;
    			

	}

	}

if(isset($_POST['th_down'])) { // for index.php after posting the reactions for thumbs down
	
	$message_id=mysqli_real_escape_string($conn,test_input($_POST['th_down']));//here getting result from the post array after submitting the form.
	  
  
	$user_email=$_SESSION['user_email'];	
	 	
	$retre=mysqli_query($conn,"select  * from reactions where user_email='".$user_email."' and mess_id='".$message_id."' and thumbsdown=-1 and reply_id=0");
	$retrei=mysqli_fetch_array($retre);
	
	

    
					
					
					if($retrei['thumbsdown']==-1)
    {
		 
			
    }
	
	
	
	
	else {
		
	 	
	
	 
		
			$insert_reaction1= mysqli_query($conn," INSERT INTO reactions (mess_id, user_email, thumbsup, thumbsdown, reply_id) VALUES ('$message_id', '$user_email', '0', '-1', '0')")  ;
    			

	}	
	
		
	
	}
	
	
	
	if(isset($_POST['admin_reply'])) { // for deletng reply messages
	
	
	
	$delete4=mysqli_query($conn,"delete from reply_message where reply_id='".$_POST['admin_reply']."'"); // from reply_message
		
	
	
	}
	

	
	if(isset($_POST['th_up1'])) { // for index.php after posting the reactions for thumbs up
	
	list($message_id, $reply_id) = explode(' ', $_POST['th_up1']);
	
	
  
	$user_email=$_SESSION['user_email'];
	
	
	$retreiv=mysqli_query($conn,"select  * from reactions where user_email='".$user_email."' and reply_id='".$reply_id."' and mess_id='".$message_id."' and thumbsup=1");
	$retreive=mysqli_fetch_array($retreiv);
	
	

    
					
					
					if($retreive['thumbsup']==1)
    {
		 
			
    }
	
	
	
	
	else {
		
	 	
	
			
			$insert_reaction= mysqli_query($conn," INSERT INTO reactions (mess_id, user_email, thumbsup, thumbsdown, reply_id) VALUES ('$message_id', '$user_email', '1', '0', '$reply_id')")  ;
    			

	}

	}

if(isset($_POST['th_down1'])) { // for index.php after posting the reactions for thumbs down
	
	list($message_id, $reply_id) = explode(' ', $_POST['th_down1']);
	  
  
	$user_email=$_SESSION['user_email'];	
	 	
	$retre=mysqli_query($conn,"select  * from reactions where user_email='".$user_email."' and mess_id='".$message_id."' and reply_id='".$reply_id."' and thumbsdown=-1");
	$retrei=mysqli_fetch_array($retre);
	
	

    
					
					
					if($retrei['thumbsdown']==-1)
    {
		 
			
    }
	
	
	
	
	else {
		
	 	
	
	 
		
			$insert_reaction1= mysqli_query($conn," INSERT INTO reactions (mess_id, user_email, thumbsup, thumbsdown, reply_id) VALUES ('$message_id', '$user_email', '0', '-1', '$reply_id')")  ;
    			

	}	
	
		
	
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
	if(isset($_POST['submit2'])) { // for index.php after posting the message and then inserting into database
	
	$message_post=mysqli_real_escape_string($conn,test_input($_POST['message_post']));//here getting result from the post array after submitting the form.
	
  
	$user_name=$_SESSION['user_name'];
	$chname=$_SESSION['chname'];
	
	if($message_post=="")
	{
		
	
	}
	
	else {
	$insert_channel=mysqli_query($conn," INSERT INTO users_message (channel_name, messages, user_name, date) VALUES ('$chname', '$message_post', '$user_name', CURRENT_TIMESTAMP())")  ;
	
	}

	}
	
	
	if(isset($_POST['jchannel'])) { 
		
		$chname = $_POST["jchannel"];
		$user_email=$_SESSION['user_email'];
		$insert_channel=mysqli_query($conn," INSERT INTO users_channel (id, channels, user_email) VALUES ('1', '$chname', '$user_email')")  ;
		$delete_channel=mysqli_query($conn," DELETE FROM unique_channel WHERE users_email='".$user_email."' and channels1='".$chname."'")  ;
		
		 echo '<script language="javascript">';
        echo 'alert("Successfully Joined"); location.href="index.php"';
        echo '</script>';
		
	}
	
	if(isset($_POST['submit4'])) { 
		
		$chname = mysqli_real_escape_string($conn,test_input($_POST["chname"]));
		
		
					$check_email_query="select * from users_channel WHERE channels='$chname'";
					$run_query=mysqli_query($conn,$check_email_query);

    
					
					
					if(mysqli_num_rows($run_query)>0)
    {
			
			echo '<script language="javascript">';
        echo 'alert("Channel name exists! Please try another one."); location.href="index.php"';
        echo '</script>';
		 exit();
		
    }
	
			
		else {	  
		
		
		$user_email=$_SESSION['user_email'];
		$invitor=$_SESSION['user_name'];
		$insert_channel=mysqli_query($conn," INSERT INTO users_channel (id, channels, user_email) VALUES ('1', '$chname', '$user_email')")  ;
		$insert4_channel=mysqli_query($conn," INSERT INTO public_channels (p_channel, invitor) VALUES ('$chname', '$invitor')")  ;

		
		$r101=mysqli_query($conn,"select user_email from users_info where user_email!='".$_SESSION['user_email']."'");
		while($r202=mysqli_fetch_array($r101))
					{
	 
					$user_email=$r202['user_email'];
					$insert3_channel=mysqli_query($conn," INSERT INTO unique_channel (channels1, users_email, invitor) VALUES ('$chname', '$user_email', '$invitor')")  ;

					}
	}	
	}
	
	
	if(isset($_POST['subform'])) {
		
		$sub_formid=mysqli_real_escape_string($conn,test_input($_POST['subform']));
		$pop_form=mysqli_real_escape_string($conn,test_input($_POST['popform']));
		$user_email=$_SESSION['user_email'];
		$user_name=$_SESSION['user_name'];
	    $chname=$_SESSION['chname'];
	
	if($pop_form=="")
	{
		
	
	}
	
	else {
	$insert_channels=mysqli_query($conn," INSERT INTO reply_message (mess_id, channel_name, message, user_email, user_name, date) VALUES ('$sub_formid', '$chname', '$pop_form', '$user_email', '$user_name', CURRENT_TIMESTAMP())")  ;

	}

		
		
	
	}	
	
	if(isset($_POST['submit6'])) {	
	
	
	$chname = mysqli_real_escape_string($conn,test_input($_POST["chname"]));
		$user_email=$_SESSION['user_email'];
		$invitor=$_SESSION['user_name'];
		$insert_channel=mysqli_query($conn," INSERT INTO users_channel (id, channels, user_email) VALUES ('1', '$chname', '$user_email')")  ;
		
		if(isset($_POST['formInvites'])) {
			
			foreach ($_POST['formInvites'] as $a){
			$insert4_channel=mysqli_query($conn," INSERT INTO unique_channel (channels1, users_email, invitor) VALUES ('$chname', '$a', '$invitor')")  ;
			
			
			}
 
		
		
		}
	}	
	
	
	
	
	if(isset($_POST['submit17'])) { // formatted code
						
						
				$post_code=mysqli_real_escape_string($conn,test_input($_POST['post_code']));
				
					
					$message_post=mysqli_real_escape_string($conn,test_input($_POST['mess_code']));	
					$user_name=$_SESSION['user_name'];
					$chname=$_SESSION['chname'];
		
		if($message_post==''){
	
		$post_insert=mysqli_query($conn," INSERT INTO users_message (channel_name, user_name, date, format_code) VALUES ('$chname', '$user_name', CURRENT_TIMESTAMP(), '$post_code') ")  ;
		}
		
		else{
			
			$post_insert=mysqli_query($conn," INSERT INTO users_message (channel_name, messages, user_name, date, format_code) VALUES ('$chname', '$message_post', '$user_name', CURRENT_TIMESTAMP(), '$post_code') ")  ;
		
			
		}
		
					
					
				
	
				
	
	
	
	}
	
	
	
	
	
	
	
	if(isset($_POST['submit16'])) { // images from file
						
						
				$url=$_POST["post_url"];
				$data = file_get_contents($url);
				
				
				// $imgExt = strtolower(pathinfo($data,PATHINFO_EXTENSION));
				// valid image extensions
		//	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
				$upload_dir = 'post_images/';
		       $userpic = rand(1000,1000000).".jpeg";
		
				$new = $upload_dir.$userpic;
				
			//	 $new = $upload_dir.$userpic;
				$success=file_put_contents($new, $data);
				
				if($success){
					
					$message_post=mysqli_real_escape_string($conn,test_input($_POST['mess_url']));	
					$user_name=$_SESSION['user_name'];
					$chname=$_SESSION['chname'];
		
		if($message_post==''){
	
		$post_insert=mysqli_query($conn," INSERT INTO users_message (channel_name, user_name, date, post_img) VALUES ('$chname', '$user_name', CURRENT_TIMESTAMP(), '$userpic') ")  ;
		}
		
		else{
			
			$post_insert=mysqli_query($conn," INSERT INTO users_message (channel_name, messages, user_name, date, post_img) VALUES ('$chname', '$message_post', '$user_name', CURRENT_TIMESTAMP(), '$userpic') ")  ;
		
			
		}
		
					
					
				}
	
				
	
	
	
	}
	
	
	

	
						if(isset($_POST['submit15'])) { // images from file
						
						
						
						$imgFile = $_FILES['post_image']['name'];
						$tmp_dir = $_FILES['post_image']['tmp_name'];
						$imgSize = $_FILES['post_image']['size'];
						
						$upload_dir = 'post_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 1000000000)				{
					
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					
					 echo '<script language="javascript">';
        echo 'alert("Large: Should be less than 10MB")';
        echo '</script>';
		$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else{
				
				
			 echo '<script language="javascript">';
        echo 'alert("Error: Only JPG, JPEG, PNG & GIF files are allowed.")';
        echo '</script>';
		$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			}
			
			
			
		// if no error occured, continue ....	
		if(!isset($errMSG))
		{
			
		$message_post=mysqli_real_escape_string($conn,test_input($_POST['mess_post']));	
		$user_name=$_SESSION['user_name'];
	    $chname=$_SESSION['chname'];
		
		if($message_post==''){
	
		$post_insert=mysqli_query($conn," INSERT INTO users_message (channel_name, user_name, date, post_img) VALUES ('$chname', '$user_name', CURRENT_TIMESTAMP(), '$userpic') ")  ;
		}
		
		else{
			
			$post_insert=mysqli_query($conn," INSERT INTO users_message (channel_name, messages, user_name, date, post_img) VALUES ('$chname', '$message_post', '$user_name', CURRENT_TIMESTAMP(), '$userpic') ")  ;
		
			
		}
		
		}
	
						}
	
	
	if(isset($_POST['submit'])) { // for workspace.php page
 
		$search = mysqli_real_escape_string($conn,test_input($_POST["search"]));
		$r1=mysqli_query($conn,"select workspace from users where workspace='".$search."'");
		$r2=mysqli_fetch_array($r1);
	
		
	}	
	


	if(isset($_POST['submit1'])) {  //for signin.php
		
		$_SESSION['user_email']=mysqli_real_escape_string($conn,test_input($_POST['user_email']));
		$_SESSION['user_pass']=mysqli_real_escape_string($conn,test_input($_POST['user_pass']));	
		
		$r1=mysqli_query($conn,"select user_email,user_pass from users_info where user_email='".$_SESSION['user_email']."' and user_pass='".$_SESSION['user_pass']."'");
        $r2=mysqli_fetch_array($r1);
   
			if($r2['user_email']==$_SESSION['user_email'] && $r2['user_pass']==$_SESSION['user_pass']) //check for valid email and password
				{
          
					$result=mysqli_query($conn,"select * from users_info where user_email='".$_SESSION['user_email']."' and user_pass='".$_SESSION['user_pass']."'");
					 
					$row=mysqli_fetch_array($result);
					$_SESSION['chname'] = "general";   // setting the default channel on load
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['page_num'] = 1;
					$_SESSION['user_pic'] = $row['user_pic'];
					
					header("Location:index.php"); //success
	
				}

	}
	
	
	if(isset($_POST['admin_post'])) { //admin message delete
		
		
		$delete_postid=mysqli_real_escape_string($conn,test_input($_POST['admin_post']));
		$delete=mysqli_query($conn,"delete from users_message where mess_id='".$delete_postid."'"); // from users_message
		$delete1=mysqli_query($conn,"delete from reply_message where mess_id='".$delete_postid."'"); // from reply_message
					
		
		
	}
	
	
	
 
function test_input($data) { // function for mysql injections
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;	
  
}
?>