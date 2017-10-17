<?php

session_start();//session starts here

if(!isset($_SESSION['user_name'])) {
   header("Location:signin.php");	

}	
error_reporting(0);


	?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Slack</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><!-- getting the bootstrap css file for predefined components  -->
  <!-- Custom CSS -->
    <link href="css/sidebar.css" rel="stylesheet">	
  
  
  </head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
               <li class="sidebar-brand">
                    <a href="index.php">
                        <?php echo $_SESSION['workspace']; ?>
                    </a>
                </li>
                <li class="sidebar-brand">
                    <a style="color:white !important;" class="actives" href="index.php"><?php echo $_SESSION['user_name']; ?></a>
                </li>
				<li>
				<a style="color:white !important;" href="signout.php" class="btn btn-danger btn-sm" role="button">Sign Out</a>
				</li>
                <li class="sidebar-brand">
                    <a>Channels</a>
                </li>
				
				<?php

$conn = mysqli_connect("localhost","admin","M0n@rch$");
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     } 
	
	mysqli_select_db($conn,'slack');
	
	
	
	
	
	
	
	 $r1=mysqli_query($conn,"select channels from users_channel where channels='".nutrition."'");
     
	 while($r2=mysqli_fetch_array($r1))
	 {
	 
   
      

?>		  
          <li>
                    <a class="actives" style="color:white !important;" href="indexn.php"><span style="padding-right:5px">#</span><?php echo $r2['channels']; ?></a>
		  </li>			
		  
		  
<?php
	 }
?>	 

<?php

 $r14=mysqli_query($conn,"select channels from users_channel where channels='".crossfit."'");
     
	 while($r24=mysqli_fetch_array($r14))
	 {
	 
   
      

?>		 
		
      <li>
          
                    <a href="indexc.php"><span style="padding-right:5px">#</span><?php echo $r24['channels']; ?></a>
		  </li>			
		  
		  
		  
<?php
	 }
?>	 

<?php

 $r15=mysqli_query($conn,"select channels from users_channel where channels='".workouts."'");
     
	 while($r25=mysqli_fetch_array($r15))
	 {
	 
   
      

?>		 
		
      <li>
          
                    <a href="indexw.php"><span style="padding-right:5px">#</span><?php echo $r25['channels']; ?></a>
		  </li>			
		  
		  
		  
<?php
	 }
?>	 


<?php

 $r13=mysqli_query($conn,"select channels from users_channel where channels='".general."'");
     
	 while($r23=mysqli_fetch_array($r13))
	 {
	 
   
      

?>		 
		
      <li>
          
                    <a  href="index.php"><span style="padding-right:5px">#</span><?php echo $r23['channels']; ?></a>
		  </li>			
		  
		  
		  
<?php
	 }
?>	 


		 <li class="sidebar-brand">
                    <a>
                        Direct Messages
                    </a>
          </li>
		  
		  
		  <?php
		  
		  
	
	     $r11=mysqli_query($conn,"select user_name from users_info where not user_name='".$_SESSION['user_name']."'");
     
	     while($r22=mysqli_fetch_array($r11))
	       {
	 
   
      

?>	
		   <li>
                    <a href="#page-content-wrapper"><?php echo $r22['user_name']; ?></a>
		  </li>			
		  

<?php


		   }
?>

					
				
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
				<div  class="col-lg-12">
				
	 <?php
		  
		  
	
	     $r33=mysqli_query($conn,"select *from users_message where ch_id='2'");
     
	     while($r34=mysqli_fetch_array($r33))
	       {
	 
   
      

?>				
				
				
			<div  class="row">			
        <div class="col-sm-2 text-center">
          <img src="user-image.jpg" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4><?php echo $r34['user_name'];?><small style="margin-left:10px"><?php echo $r34['date'];?></small></h4>
          <p><?php echo $r34['messages'];?></p>
          <hr>
		  
        </div>
		
			</div>

		
<?php
		   }
		   
		   
$conn->close();		   
?>
					

                    </div>
                </div>
				
				
		
		
            </div>
        </div>
		
        <!-- /#page-content-wrapper -->
		
		
		                       <nav class="navbar navbar-fixed-bottom">
							
								    <div class="row">
										<div class="col-sm-3 col-md-3">
										</div>
										<div class="col-sm-9 col-md-9">
											<form class="navbar-form" action="index2.php" method="post">
												<div class="row">
					<div class="input-group input-group-lg col-lg-10">
						
						<input type="text" name="message_post" class="form-control" placeholder="Message">
						
						</div>
							<div class="input-group input-group-btn col-lg-2">
								<button name="submit" value="submit" class="btn btn-success btn-lg" type="submit">
									Post
								</button>
							</div>
							
				</div>			
					
			</form>
	</div>
	</div>
	
</nav>




    </div>
    <!-- /#wrapper -->
</body>

</html>
