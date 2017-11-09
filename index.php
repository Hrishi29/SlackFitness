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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><!-- getting the bootstrap css file for predefined components  -->
  <!-- Custom CSS -->
    <link href="css/sidebar.css" rel="stylesheet">	
  <style>
  
  
  
  </style>
  
  </head>

<body>

<div id="myModal1" class="modal fade" role="dialog">
 <center class="dialogStyle">
 <div class="modal-dialog">

    <!-- Modal content-->
	<div class="container">
	<div class="row">
	
        <div class="col-md-6">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#030778">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title" style="font-weight:bolder;font-size:2.5em; color:white">Profile</h3>
      </div>
      <div class="modal-body">
        <center>
		
		<img src="user-image.jpg" class="img-rounded responsive" name="user_image"  width="170" height="130"> 
			
			<br>
			<br>
			<br>
			<br>
		<div><span style="font-weight:bold">Username: </span><span><?php echo $_SESSION['user_name']; ?></span></div>
		
		<br>
		<br>
		<div><span style="font-weight:bold">Email-Id: </span><span><?php echo $_SESSION['user_email']; ?></span></div>
		<br>
		
		
		</center>		
      <div class="modal-footer">
		
    
    <button type="button"  data-dismiss="modal" class="btn btn-danger custom bold">Back</button>
	
       
      </div>
    </div>
	</div>
</div>
</div>
  </div>
  </div>
  </center>
</div>







<!-- Modal FRONT -->
<div id="myModal" class="modal fade" role="dialog">
 
 <div class="modal-dialog">

    <!-- Modal content-->
	<div class="container">
	<div class="row">
	
        <div class="col-md-6">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#030778">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title" style="font-weight:bolder;font-size:2.5em; color:white">Channels</h3>
      </div>
      <div class="modal-body">
        <ul class="nav nav-pills">
			<li class="active"><a data-toggle="pill" href="#home">Create Channels</a></li>
			<li><a data-toggle="pill" href="#home1">Browse Channels</a></li>
			<li><a data-toggle="pill" href="#home2">Invites</a></li>
			
		</ul>
		<hr>
		
		<div class="tab-content">
		
		
			 <div id="home" class="tab-pane fade in active">
		
		 <form method="post" action="index.php">
            <div class="form-group">
              <label for="cname">Channel Name</label>
              <input type="text" name="chname" class="form-control" id="cname" placeholder="Enter name" required>
			  
            </div>
            
			<ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#private">Private</a></li>
    <li><a data-toggle="pill" href="#public">Public</a></li>
            </ul>
			
  <br>
  
  <div class="tab-content">
    <div id="private" class="tab-pane fade in active">
	
		<div class="form-group">
              <label for="invites">Send Invites To:(Optional)</label>
              
			  <select multiple class="form-control" id="invites" name="formInvites[]">
			  <?php
			  
			  include 'connect.php';
			  
			  
			  $rinvites=mysqli_query($conn,"select *from users_info where user_name!='".$_SESSION['user_name']."' and user_email!='".$_SESSION['user_email']."'");
     
					while($r29=mysqli_fetch_array($rinvites))
						{
	 
			  ?>
			  
                   
			   <option value="<?php echo $r29['user_email']; ?>"><h2>Name:</h2><?php echo $r29['user_name'] ?> <span style="margin-left:4px; font-weight:bold !important;" >Email id: </span> <?php echo $r29['user_email']; ?></option>
			  
			  <?php
		
		
		}
				
				
				?>
				
			</select>
			<br>
			 Hold ctrl or shift (or drag with the mouse) to select more than one 
            </div>
            
      
      <button type="submit" name="submit6" value="submit6" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-off"></span> Create Channel</button>
	  
    </div>
	
	
	
    <div id="public" class="tab-pane fade">
	
		<button type="submit" name="submit4" value="submit4" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-off"></span> Create Channel</button>
     </div>
    
  </div>
			
             
  <br>
            
          </form>
			
		
				
      <div class="modal-footer">
		
    
     <button type="button"  data-dismiss="modal" class="btn btn-danger custom bold">Back</button>
	
       
      </div>
	  
    
		</div>
		
		<div id="home1" class="tab-pane fade">
		
		<h4>Channels you can join to:</h4>
	  

      <div style="max-height:200px; overflow-y:auto;"class="well">
      <form method="post" action="index.php">
	  	<ul class="list-group">
		   
<?php
	
	 $ichannels=mysqli_query($conn,"select *from unique_channel where users_email='".$_SESSION['user_email']."'");
     
					while($r59=mysqli_fetch_array($ichannels))
						{
	 
						

?> 

		   
			<li class="list-group-item"># <?php echo $r59['channels1']; ?></li><button style="margin:5px 0 5px 0" type="submit" value="<?php echo $r59['channels1']; ?>" name="jchannel" class="btn btn-primary btn-sm">Join Channel</button>
			
	
<?php

						}
?>
	</ul>	
			
			
	  </form>	
	  </div>

		
		
		
      <h4>Channels you belong to:</h4>
	  

      <div style="max-height:200px; overflow-y:auto;"class="well">
      
	  	<ul class="list-group">
		   
<?php
	
	 $jchannels=mysqli_query($conn,"select *from users_channel where user_email='".$_SESSION['user_email']."'");
     
					while($r59=mysqli_fetch_array($jchannels))
						{
	 
						

?> 

		   
			<li class="list-group-item">#<?php echo $r59['channels']; ?></li>
			<br>
			
	
<?php

						}
?>
	</ul>	
			
			
	  	
	  </div>

	<div class="modal-footer">
		
    
     <button type="button"  data-dismiss="modal" class="btn btn-danger custom bold">Back</button>
	
       
      </div>
	  	
	
	</div>
	
	<div id="home2" class="tab-pane fade">
		
		<h4>You have following invites:</h4>
	  

      <div style="max-height:400px; overflow-y:auto;"class="well">
      <form method="post" action="index.php">
	  	<ul class="list-group">
		   
<?php
	
	 $ichannels1=mysqli_query($conn,"select *from unique_channel where users_email='".$_SESSION['user_email']."'");
     
					while($r591=mysqli_fetch_array($ichannels1))
						{
	 
						

?> 

		   
			<li class="list-group-item">You have been invited by <?php echo $r591['invitor']; ?> to join the channel: <span style="font-weight:bold">#<?php echo $r591['channels1']; ?></span></li><button style="margin:5px 0 5px 0" type="submit" value="<?php echo $r591['channels1']; ?>" name="jchannel" class="btn btn-primary btn-sm">Join Channel</button>
			
	
<?php

						}
?>
	</ul>	
			
			
	  </form>	
	  </div>

		
		
		
		
		<div class="modal-footer">
		
    
     <button type="button"  data-dismiss="modal" class="btn btn-danger custom bold">Back</button>
	
       
      </div>
	
		
		</div>
	</div>
	
	</div>
	</div>
</div>
</div>
  </div>
  </div>
  
</div>



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
                    <a style="color:white !important;" class="actives" data-toggle="modal" href="#myModal1"><?php echo $_SESSION['user_name']; ?></a>
                </li>
				<li>
				<a style="color:white !important;" href="signout.php" class="btn btn-danger btn-sm" role="button">Sign Out</a>
				</li>
                <li class="sidebar-brand">
                    <a style="color:white !important;" data-toggle="modal" href="#myModal" >Channels <span class="glyphicon glyphicon-plus-sign" style="margin-top:2px"></span></a>
                </li>
				
				
				<?php

		
					
	 
	 
					if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET" ) {
	
					include 'query.php';
	
					} 
	
	
	
					$r1=mysqli_query($conn,"select *from users_channel where channels!='".$_SESSION['chname']."' and user_email='".$_SESSION['user_email']."'");
     
					while($r2=mysqli_fetch_array($r1))
						{
	 
							$chname = $r2['channels'];
							
      
		
	  

				?>		  
          <li>
				<?php	
					echo '<a href="index.php?chname=' . $chname . '"># ' . $r2['channels'] . '</a>';
                    
				?>
		 </li>			
		  
		  
				<?php
					}
				?>	 
 


		 
		
      <li>
				<?php	
					echo '<a class="actives" style="color:white !important;" href="index.php?chname=' . $_SESSION['chname'] . '"># ' . $_SESSION['chname'] . '</a>';
                    
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
		  
		  
					$r33=mysqli_query($conn,"select *from users_message where channel_name='".$_SESSION['chname']."'");
					
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
					
					
					
					

					<form action="index.php" method="post"> 
					<a href="#" data-toggle="popover" data-html="true" data-placement="bottom" data-content='<form method="post" action="index.php"><input name="popform" type="text"/></form>'  >Reply</a> 
					<button style="margin-left:30px;margin-right:5px" class="btn btn-default btn-xs" type="submit" value="<?php echo $r34['mess_id'];?>" name="th_up"><span class="glyphicon glyphicon-thumbs-up"></span></button>
					<?php

						$reactionsup=mysqli_query($conn,"select thumbsup from reactions where mess_id='".$r34['mess_id']."'");
						$sum = 0;
					
					while($r3461=mysqli_fetch_array($reactionsup))
						{
		
							$sum = $sum + $r3461['thumbsup'];
									
		
						}
						
						echo $sum;
					?>
			
					<button style="margin-left:30px;margin-right:5px" class="btn btn-default btn-xs" type="submit" value="<?php echo $r34['mess_id'];?>" name="th_down"><span class="glyphicon glyphicon-thumbs-down"></span></button>
					<?php

						$reactionsdown=mysqli_query($conn,"select thumbsdown from reactions where mess_id='".$r34['mess_id']."'");
						$sum1 = 0;
					
					while($r3462=mysqli_fetch_array($reactionsdown))
						{
		
							$sum1 = $sum1 + $r3462['thumbsdown'];
									
		
						}
						
						echo $sum1;
					?>
			
					</form>
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
						
						<textarea type="text" name="message_post" class="form-control" placeholder="Message"></textarea>
						
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
	
	<script>
$(document).ready(function(){
	
    $('[data-toggle="popover"]').popover(); 
});
</script>
	
</body>

</html>
