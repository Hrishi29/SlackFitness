<?php


function goToAuthUrl()
{
	
	$client_id = "d7df5ea1694abfd1d2b5";
	$redirect_url1 = "http://localhost/milestone1/callback.php";
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		
		$url = 'https://github.com/login/oauth/authorize?client_id='.$client_id."&redirect_url=".$redirect_url1."&scope=user";
		header("location: $url");
		
	}
	
	
	
}


function fetchData()

{
	
	$client_id = "d7df5ea1694abfd1d2b5";
	$redirect_url1 = "http://localhost/milestone1/callback.php";
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	
		if(isset($_GET['code'])) {
			
			$code = $_GET['code'];
			$post1 = http_build_query(array(
					'client_id' => $client_id,
					'redirect_url' => $redirect_url1,
					'client_secret' => 'ce2bddecd820a85d5405d7f877d7a9802f7e9ea3',
					'code' => $code,
					
				));
			
		}
	
		$access_data1 = file_get_contents("https://github.com/login/oauth/access_token?".$post1);
		$exploded1 = explode('access_token=', $access_data1);
		$exploded2 = explode('&scope=user', $exploded1[1]);
		$access_token = $exploded2[0];
		
		$opts =[ 'http' => [
						'method' => 'GET',
						'header' => [ 'User-Agent: PHP']
				    ]
		];
		
		$url = "https://api.github.com/user?access_token=$access_token";
		$context = stream_context_create($opts);
		$data = file_get_contents($url, false, $context);
		$user_data = json_decode($data, true);
		$username = $user_data['login'];
		$email = $user_data['email'];
		$userpic = $user_data['avatar_url'];
		
		$userPayload = [
		
			'username' => $username,
			'email' => $email,
			'avatar_url' => $userpic,
		
		];
		
		//$_SESSION['payload'] = $userPayload; 
		$_SESSION['user_name'] = $username;
		$_SESSION['user_email'] = $email;
		$_SESSION['user_pic'] = $userpic;
		
		include 'connect.php';
			
		
		$r1=mysqli_query($conn,"select user_name from users_info where user_name='".$_SESSION['user_name']."'");
        $r2=mysqli_fetch_array($r1);
   
			if($r2['user_name']==$_SESSION['user_name']) //check for valid email and password
				{
					$update_insert=mysqli_query($conn," UPDATE users_info SET user_pic = '$userpic' WHERE user_name = '$username'")  ;
					
					$_SESSION['chname'] = "general";   // setting the default channel on load
					
					$_SESSION['page_num'] = 1;
					
					
				
	
				}
				
				else {
				
					if($_SESSION['user_email']==NULL || $_SESSION['user_email']=="" )
					
					{
						$_SESSION['user_email']= $_SESSION['user_name'].'@fitness.com';
						$user_email=$_SESSION['user_email'];
						$userpic=$_SESSION['user_pic'];
						$user_name=$_SESSION['user_name'];
						$insert_user="INSERT INTO users_info (id, user_pic, user_name, user_email, grav_image) VALUES ('1', '$userpic', '$user_name', '$user_email', '1')";

    if(mysqli_query($conn,$insert_user))
    {				
				  
				  $insert1_channel=mysqli_query($conn," INSERT INTO users_channel (id, channels, user_email) VALUES ('1', 'general', '$user_email')")  ;
				  
					$r103=mysqli_query($conn,"select  *from public_channels");
					while($r203=mysqli_fetch_array($r103))
					{
					
					$pchannel=$r203['p_channel'];
					$invitor=$r203['invitor'];
					$insert2_channel=mysqli_query($conn," INSERT INTO unique_channel (channels1, users_email, invitor) VALUES ('$pchannel', '$user_email', '$invitor')")  ;
					$_SESSION['page_num'] = 1;
					
					}

	}
					}	
					else 
					{
						
						$user_email=$_SESSION['user_email'];
						$userpic=$_SESSION['user_pic'];
						$user_name=$_SESSION['user_name'];
						$insert_user="INSERT INTO users_info (id, user_pic, user_name, user_email, grav_image) VALUES ('1', '$userpic', '$user_name', '$user_email', '1')";

    if(mysqli_query($conn,$insert_user))
    {				
				  
				  $insert1_channel=mysqli_query($conn," INSERT INTO users_channel (id, channels, user_email) VALUES ('1', 'general', '$user_email')")  ;
				  
					$r103=mysqli_query($conn,"select  *from public_channels");
					while($r203=mysqli_fetch_array($r103))
					{
					
					$pchannel=$r203['p_channel'];
					$invitor=$r203['invitor'];
					$insert2_channel=mysqli_query($conn," INSERT INTO unique_channel (channels1, users_email, invitor) VALUES ('$pchannel', '$user_email', '$invitor')")  ;
					$_SESSION['page_num'] = 1;
					
					}

	}
					}	
						
					}	
					
				
				
				
	
		return $userPayload;
		
	}
		
	
	
	else {
		
		die('error');
		
	}
	

}


?>