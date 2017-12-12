<?php 

	if(isset($_GET['chname']) ) { // for index.php page for login into respective channesla
 
		$chname=mysqli_real_escape_string($conn,test_input($_GET['chname']));
		if(is_numeric ($chname)){
			$retreiv890=mysqli_query($conn,"select  user_name from users_info where user_id='".$chname."'");
			$retreive891=mysqli_fetch_array($retreiv890);
			$_SESSION['dmname']=$retreive891['user_name'];
			
			$retreiv888=mysqli_query($conn,"select  user_id from users_info where user_email='".$_SESSION['user_email']."'");
			$retreive889=mysqli_fetch_array($retreiv888);
			$_SESSION['chname']=$chname.$retreive889['user_id'];
		echo '<script language="javascript">';
        echo ' location.href="index.php"';
        echo '</script>';		
			
		}
		
		else{
        $_SESSION['chname']=$chname;
		echo '<script language="javascript">';
        echo ' location.href="index.php"';
        echo '</script>';		
		}	
	
	}
	
	 
	
	
	
	if(isset($_GET['pagenum']) ) { // for index.php page for login into respective channesla
 
		
        $_SESSION['page_num']=mysqli_real_escape_string($conn,test_input($_GET['pagenum']));
		 
				
		
	}
	

	if(isset($_POST['git_submit'])) {
		
		
		echo '<script language="javascript">';
       echo ' location.href="https://github.com/login/oauth/authorize?client_id=ac663d73afe16b4b7d4c&scope=repo,user&state=hgadkari"';
        echo '</script>';
		
	
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

	
	if(isset($_POST['delete_image'])) { // delete image
	
	$user_email=$_SESSION['user_email'];
	$userpic=$_SESSION['user_pic'];
	
	if($row_grav1['grav_image']==0)
			{
				$email = $user_email;

$default = "https://image.freepik.com/free-icon/user-image-with-black-background_318-34564.jpg";
$size = 200;	
$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
$userpic = $grav_url;

				
				$delete_insert=mysqli_query($conn," UPDATE users_info SET user_pic = '$userpic', grav_image = '1' WHERE user_email = '$user_email'")  ;
		
				$_SESSION['user_pic']=$userpic;
		echo '<script language="javascript">';
        echo 'location.href="index.php"';
        echo '</script>';
				
			}
		else {
	
	$default_image="user-image.jpg";	
	
	$delete_insert=mysqli_query($conn," UPDATE users_info SET user_pic = '$default_image' WHERE user_email = '$user_email'")  ;
	if(delete_insert){
	
	$_SESSION['user_pic']=$default_image;
	echo '<script language="javascript">';
        echo 'location.href="index.php"';
        echo '</script>';
		

	}
	
		}
	}	
	
	
	
	
	if(isset($_POST['update_image'])) { // update image
						
						
						$imgFile = $_FILES['user_image1']['name'];
						$tmp_dir = $_FILES['user_image1']['tmp_name'];
						$imgSize = $_FILES['user_image1']['size'];
						
						if($imgFile)
		{
		
						
						$upload_dir = 'user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '20MB'
				if($imgSize < 1000000000)				{
					 
					unlink($upload_dir.$_SESSION['user_pic']);
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
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $_SESSION['user_pic']; // old image from database
		}	
			
			
			
		// if no error occured, continue ....	
		if(!isset($errMSG))
		{
			$user_email=$_SESSION['user_email'];
			 $_SESSION['user_pic'] = $userpic;
			 
			 $result_grav1=mysqli_query($conn,"select * from users_info where user_email='".$_SESSION['user_email']."'");
			$row_grav1=mysqli_fetch_array($result_grav1);	
			if($row_grav1['grav_image']!=NULL)
			{
				$update_insert=mysqli_query($conn," UPDATE users_info SET user_pic = '$userpic', grav_image = 0 WHERE user_email = '$user_email'")  ;
		echo '<script language="javascript">';
        echo 'location.href="index.php"';
        echo '</script>';
				
			}
		
		else
		{	
		
		$update_insert=mysqli_query($conn," UPDATE users_info SET user_pic = '$userpic' WHERE user_email = '$user_email'")  ;
		echo '<script language="javascript">';
        echo 'location.href="index.php"';
        echo '</script>';
		
		}
		
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
		$insert_private=mysqli_query($conn," INSERT INTO private_channel (channel_name, user_email) VALUES ('$chname', '$user_email')")  ;
		
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
	
	
	
					if(isset($_POST['submit50'])) { // file from computer
						
						
						
						$imgFile = $_FILES['post_file']['name'];
						$tmp_dir = $_FILES['post_file']['tmp_name'];
						$imgSize = $_FILES['post_file']['size'];
						
						$upload_dir = 'post_file/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('zip', 'rar', 'xlsx', 'cad', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'pps', 'ppsx', 'odt', 'xls', 'xlsx', 'mp3', 'm4a', 'ogg', 'wav', 'mp4', 'm4v', 'mov', 'wmv'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '20MB'
				if($imgSize < 2000000000)				{
					
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
        echo 'alert("Error: Filetype not accepted.")';
        echo '</script>';
		$errMSG = "Sorry, Filetype not accepted.";
			}
			
			
			
		// if no error occured, continue ....	
		if(!isset($errMSG))
		{
			
		$message_post=mysqli_real_escape_string($conn,test_input($_POST['file_post']));	
		$user_name=$_SESSION['user_name'];
	    $chname=$_SESSION['chname'];
		
		if($message_post==''){
	
		$post_insert=mysqli_query($conn," INSERT INTO users_message (channel_name, user_name, date, post_file, org_name) VALUES ('$chname', '$user_name', CURRENT_TIMESTAMP(), '$userpic', '$imgFile') ")  ;
		}
		
		else{
			
			$post_insert=mysqli_query($conn," INSERT INTO users_message (channel_name, messages, user_name, date, post_file, org_name) VALUES ('$chname', '$message_post', '$user_name', CURRENT_TIMESTAMP(), '$imgFile') ")  ;
		
			
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
					
					
					 if($row['two_factor']==1) {
						
							
include 'class.phpmailer.php';
require_once 'class.smtp.php';
include 'connect.php';
//sendMailForNewUser('hgadk001@odu.edu', 'hrishi');
    $length = 30;
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	
	
	
	$_SESSION['chname'] = "general";   // setting the default channel on load
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['page_num'] = 1;
					$_SESSION['user_pic'] = $row['user_pic'];
					
	
	$useremail=$_SESSION['user_email'];
	$update_insert=mysqli_query($conn," UPDATE users_info SET two_string = '$str' WHERE user_email = '$useremail'")  ;
			
					
//function sendMailForNewUser($email,$userName){
   $return_arrfinal = array();
     $status_array['status'] = '1';
     $mail = new PHPMailer();
     $toarraymail=$useremail;
     $mail->SMTPDebug = 1;                              // Enable verbose debug output
     $mail->Port = '587';
     $mail->isSMTP();                                      // Set mailer to use SMTP // Specify main and backup SMTP servers                                    // Set mailer to use SMTP
     $mail->Host = gethostbyname('smtp.gmail.com');  // Specify main and backup SMTP servers
     $mail->SMTPAuth = true; // Authentication must be disabled

     $mail->Username = 'ghrishi29@gmail.com';
     $mail->Password = 'userhrishi30';
     $mail->SMTPSecure= 'tls';


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
     

}
				else {	
					$_SESSION['chname'] = "general";   // setting the default channel on load
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['page_num'] = 1;
					$_SESSION['user_pic'] = $row['user_pic'];
					
					header("Location:index.php"); //success
	
				}
		 }	

	}
	
	
	if(isset($_POST['admin_post'])) { //admin message delete
		
		
		$delete_postid=mysqli_real_escape_string($conn,test_input($_POST['admin_post']));
		$delete=mysqli_query($conn,"delete from users_message where mess_id='".$delete_postid."'"); // from users_message
		$delete1=mysqli_query($conn,"delete from reply_message where mess_id='".$delete_postid."'"); // from reply_message
					
		
		
	}
	
	
	if(isset($_POST['submit_code'])) {
		
		$mail_code=mysqli_real_escape_string($conn,test_input($_POST['mail_code']));
		$result=mysqli_query($conn,"select * from users_info where user_email='".$_SESSION['user_email']."'");
					 
					$row=mysqli_fetch_array($result);
					
					if($row['two_string']==$mail_code)
					{
					
						header("Location:index.php");
						
					}	
					
					else {
						
						
						 echo '<script language="javascript">';
        echo 'alert("Authorization Failed: Redirecting to Workspace!"); location.href="workspace.php"';
        echo '</script>';
						session_unset();
						
						//header("Location:signin.php");

						
					}
						
		
	}
	
	if (isset($_POST['pillwork'])) {
		$useremail=$_SESSION['user_email'];
$result7001=mysqli_query($conn,"select * from users_info where user_email='".$_SESSION['user_email']."'");
					 
					$row7011=mysqli_fetch_array($result7001);
					
					if($row7011['two_factor']==0)
					{
	
						$update_insert=mysqli_query($conn," UPDATE users_info SET two_factor = '1' WHERE user_email = '$useremail'")  ;
	
	
					}
					
					else {
						
						$update_insert=mysqli_query($conn," UPDATE users_info SET two_factor = '0' WHERE user_email = '$useremail'")  ;
	
						
					}
	}
	
	if (isset($_POST['contact_submit'])) {
		
	$firstname = mysqli_real_escape_string($conn,test_input($_POST['firstname']));
	$lastname =	mysqli_real_escape_string($conn,test_input($_POST['lastname']));
	$contactno = mysqli_real_escape_string($conn,test_input($_POST['contactno']));
	$emailid =	mysqli_real_escape_string($conn,test_input($_POST['email_id']));
	$subject = mysqli_real_escape_string($conn,test_input($_POST['subject']));
		
		include 'class.phpmailer.php';
		require_once 'class.smtp.php';

		$return_arrfinal = array();
     $status_array['status'] = '1';
     $mail = new PHPMailer();
     $toarraymail="hgadk001@odu";
     $mail->SMTPDebug = 1;                              // Enable verbose debug output
     $mail->Port = '587';
     $mail->isSMTP();                                      // Set mailer to use SMTP // Specify main and backup SMTP servers                                    // Set mailer to use SMTP
     $mail->Host = gethostbyname('smtp.gmail.com');  // Specify main and backup SMTP servers
     $mail->SMTPAuth = true; // Authentication must be disabled

     $mail->Username = 'ghrishi29@gmail.com';
     $mail->Password = 'userhrishi30';
     $mail->SMTPSecure= 'tls';


     $mail->setFrom("ghrishi29@gmail.com","Fitness");
     $mail->AddAddress($toarraymail);     // Add a recipient
     // Optional name
     $mail->isHTML(true);                                  // Set email format to HTML
		
     $mail->Subject = 'Contact For Fitness.com';
     $mail->Body    =" Name: $firstname $lastname <br> Email Id: $emailid <br> Contact number: $contactno <br> Subject: $subject";
     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

     if(!$mail->Send()){
       echo "false";
       echo 'Mailer Error: ' . $mail->ErrorInfo;
	   
       return false;
     }else{
       echo '<script language="javascript">';
        echo 'alert("Submitted Successfully!")';
        echo '</script>';
       
     }
   
		
	}
	
	
function test_input($data) { // function for mysql injections
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;	
  
}
?>