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

		
	 include 'connect.php';
	 
	 
	if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET" ) {
	
	include 'query.php';
	
	} 
	
	
	
	 $r1=mysqli_query($conn,"select *from users_channel where channels!='".$_SESSION['chname']."'");
     
	 while($r2=mysqli_fetch_array($r1))
	 {
	 
		$chname = $r2['channels'];
		$chid = $r2['ch_id'];
      
		
	  

?>		  
          <li>
				<?php	
					echo '<a href="index.php?chid=' . $chid . '&chname=' . $chname . '"># ' . $r2['channels'] . '</a>';
                    
				?>
		 </li>			
		  
		  
<?php
	 }
?>	 
 


		 
		
      <li>
				<?php	
					echo '<a class="actives" style="color:white !important;" href="index.php?chid=' . $_SESSION['chid'] . '&chname=' . $_SESSION['chname'] . '"># ' . $_SESSION['chname'] . '</a>';
                    
				?>
          
                    
		  </li>			
		  
		  
		  
 


		 <li class="sidebar-brand">
                    <a href="#">
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
		  
		  
		 $r55=mysqli_query($conn,"select ch_id from users_channel where channels='".$_SESSION['chname']."'");
		 $r56=mysqli_fetch_array($r55);
		 $_SESSION['chid']=$r56['ch_id'];
	     $r33=mysqli_query($conn,"select *from users_message where ch_id='".$_SESSION['chid']."'");
     
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
											<form class="navbar-form" action="index.php" method="post">
												<div class="row">
					<div class="input-group input-group-lg col-lg-10">
						
						<input type="text" name="message_post" class="form-control" placeholder="Message">
						
						</div>
							<div class="input-group input-group-btn col-lg-2">
								<button name="submit2" value="submit2" class="btn btn-success btn-lg" type="submit">
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
