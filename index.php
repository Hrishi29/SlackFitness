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
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><!-- getting the bootstrap css file for predefined components  -->
	

  <!-- Custom CSS -->
    <link href="css/sidebar.css" rel="stylesheet">	
  <style>
li.L0, li.L1, li.L2, li.L3,
li.L5, li.L6, li.L7, li.L8 {
  list-style-type: decimal !important;
}
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
		
		
		
		
		<img src="user_images/<?php echo $_SESSION['user_pic']; ?>" class="img-rounded responsive" name="user_image"  width="200" height="200"> 
			
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



<!-- Modal FRONT -->
<div id="myModal10" class="modal fade" role="dialog">
 
 <div class="modal-dialog">

    <!-- Modal content-->
	<div class="container">
	<div class="row">
	
        <div class="col-md-6">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#030778">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title" style="font-weight:bolder;font-size:2.5em; color:white">Embed</h3>
      </div>
      <div class="modal-body">
        <ul class="nav nav-pills">
			<li class="active"><a data-toggle="pill" href="#home5">Image From Computer</a></li>
			<li><a data-toggle="pill" href="#home6">Image From Web </a></li>
			<li><a data-toggle="pill" href="#home7">Pretty Formatted Code</a></li>
			
		</ul>
		<hr>
		
		<div class="tab-content">
		
		
			 <div id="home5" class="tab-pane fade in active">
		
		 <form method="post" action="index.php" enctype="multipart/form-data">
		 
		    <div class="form-group">
			
			<label for="cmess">Enter Description: </label>
			<textarea style="margin-top:20px;" class="form-control" type="text" name="mess_post" id="cmess" placeholder="(Optional)" ></textarea>

			
		
			</div>
			
		 
		 
            <div class="form-group">
			
			<input style="margin-top:20px;" type="file" name="post_image" accept="image/*" />

			
		
			</div>
			
			<div class="form-group">
			
			<button type="submit" value="submit15" name="submit15"  class="btn btn-success">Upload</button>
			
            </div>
			
  <br>
            
          </form>
			
		
				
      <div class="modal-footer">
		
    
     <button type="button"  data-dismiss="modal" class="btn btn-danger custom bold">Back</button>
	
       
      </div>
	  
    
		</div>
		
		<div id="home6" class="tab-pane fade">
		
		<h4>Preview</h4>
		
		<!--<div  id="image_preview"></div>-->

     <br>
       <form method="post" action="index.php" enctype="multipart/form-data">
		 
		    <div class="form-group">
			
			<label for="curl">Enter Description: </label>
			<textarea style="margin-top:20px;" class="form-control" type="text" name="mess_url" id="curl" placeholder="(Optional)" ></textarea>

			
		
			</div>
			
		 <br>
		 
            <div class="form-group">
			
			<label for="purl">Enter URL: </label>
			<input style="margin-top:20px; "  onchange="preview_image();" class="form-control" type="text" name="post_url" id="purl" placeholder="Enter URL"  required />

			
		
			</div>
			
			<div class="form-group">
			
			<button type="submit" value="submit16" name="submit16"  class="btn btn-success">Upload</button>
			
            </div>
			
  <br>
            
          </form>
		

		
		
		

	<div class="modal-footer">
		
    
     <button type="button"  data-dismiss="modal" class="btn btn-danger custom bold">Back</button>
	
       
      </div>
	  	
	
	</div>
	
	<div id="home7" class="tab-pane fade">
		
		
		 <form method="post" action="index.php">
		 
		    <div class="form-group">
			
			<label for="durl">Enter Description: </label>
			<textarea style="margin-top:20px;" class="form-control" name="mess_code" id="durl" placeholder="(Optional)"></textarea>

			
		
			</div>
			
		 <br>
		 
            <div class="form-group">
			
			<label for="eurl">Paste Code: </label>
			
			
			
			<textarea style="margin-top:20px; height:100px "  class="form-control"  name="post_code" id="eurl" placeholder="Enter Code"  required></textarea>

			
		
			</div>
			
			
			
			
			<div class="form-group">
			
			<button type="submit" value="submit17" name="submit17"  class="btn btn-success">Upload</button>
			
            </div>
			
  <br>
            
          </form>
		
		
		
		
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

		<!-- NavBar defined                                                                     -->

				<nav class="navbar navbar-inverse navbar-fixed-top">
						<div class="container-fluid">
							<div class="navbar-header">
								<a style="font-weight:bold; font-size:2.5em; font-family:'Salsa'; color:orange" class="navbar-brand" href="index.php">Fitness</a>
							</div>
								<ul class="nav navbar-nav">
									<?php
									$unarchive3 = mysqli_query($conn,"(select archive_channel from archive where channels='".$_SESSION['chname']."' ORDER BY arch_id DESC)");
										$unarchive4=mysqli_fetch_array($unarchive3);
										
										
										if($unarchive4['archive_channel']=="unarchive")
										{
										
									?>
									<li style="margin-left:180px" class="active"><a href="" style="font-size:1.5em; font-weight:bold">#<?php echo $_SESSION['chname']; ?></a></li>
									
							<?php
							
										}
										
										else {
							
							?>
							
							
									<li style="margin-left:180px;" ><a href="#" style="color:red; font-size:1.5em; font-weight:bold" data-toggle="tooltip" title="The channel is archived by admin!">#<?php echo $_SESSION['chname']; ?></a></li>
									
							
							
							<?php
							
										}
							
							?>
							
							</ul>
							
							
							<!--       Search Users          -->
							
							<form>
					<div style="margin-top:5px; margin-left:10px" class="col-md-3">
					<div class="input-group">
										<input type="text" autocomplete="off" id="search" class="form-control" placeholder="Search">
										<div class="input-group-btn">
											<button class="btn btn-default" type="submit">
												<i class="glyphicon glyphicon-search"></i>
											</button>
										</div>

										
									</div>
					
					</div>
					</form>
					
							
							
							<?php
					if($_SESSION['user_email']=="admin@super.com")    //for admin
					
					{
					

							$unarchive5 = mysqli_query($conn,"(select archive_channel from archive where channels='".$_SESSION['chname']."' ORDER BY arch_id DESC)");
										$unarchive6=mysqli_fetch_array($unarchive5);
										
										
										if($unarchive6['archive_channel']=="unarchive")
										{
									
						
					?>
					
					<form method="post" action="index.php">
					
					<button style="margin-left:10px"  class="btn btn-danger navbar-btn btn-sm"  name="channel_archive1" type="submit">Archive Channel</button>
					
					</form>
					<?php
					
										}
										
										
										else
											
											{
					

						?>
						
						
						<form method="post" action="index.php">
					
					<button style="margin-left:10px" class="btn btn-success navbar-btn btn-sm"  name="channel_archive2" type="submit">Unarchive Channel</button>
					
					</form>
						
						
						
						<?php
						
											}
						}
					?>
					<div class="col-md-3"  id="display" style="" href=""></div>
					
			
						</div>
				</nav>


    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a style="color:white !important;" href="index.php">
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
                    <a style="color:white !important; font-weight:bold" data-toggle="modal" href="#myModal" >Channels <span class="glyphicon glyphicon-plus-sign" style="margin-top:2px"></span></a>
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
		  <!--
		  <li>
				<a style="color:white !important; margin-left:-5px" href="signout.php" class="btn btn-success btn-sm" role="button">Archive</a>
				</li>
		  -->
 


		 <li class="sidebar-brand">
                    <a style="color:white !important; font-weight:bold" href="#">
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
        <div style="margin-top:50px !important;" id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
				<div  class="col-lg-12">
			
		
		
      
	  
    
		
			
				
				
				<?php
						if($_SESSION['page_num'] == 1)
					{
		  
					$r33=mysqli_query($conn,"(select *from users_message where channel_name='".$_SESSION['chname']."' ORDER BY mess_id DESC LIMIT 3)ORDER BY mess_id ASC");
					$r1110=mysqli_query($conn,"(select *from users_message where channel_name='".$_SESSION['chname']."' ORDER BY mess_id DESC LIMIT 3)ORDER BY mess_id ASC");
					
					$r1009=mysqli_fetch_array($r1110);
					$_SESSION['mess_id']=$r1009['mess_id'];
					
	
						}
						
						else if($_SESSION['page_num'] == 2){
							
							
							$r33=mysqli_query($conn,"(select *from users_message WHERE mess_id < '".$_SESSION['mess_id']."' and channel_name='".$_SESSION['chname']."' ORDER BY mess_id DESC LIMIT 3)ORDER BY mess_id ASC");
							$r1110=mysqli_query($conn,"(select *from users_message WHERE mess_id < '".$_SESSION['mess_id']."' and channel_name='".$_SESSION['chname']."' ORDER BY mess_id DESC LIMIT 3)ORDER BY mess_id ASC");
					
					
					$r1009=mysqli_fetch_array($r1110);
					$_SESSION['mess_id']=$r1009['mess_id'];
					 echo '<script language="javascript">';
        echo 'alert("'.$_SESSION['mess_id'].'")';
        echo '</script>';
		
							
						}
						
						else {
						
						$r1110=mysqli_query($conn,"(select *from users_message WHERE mess_id >= '".$_SESSION['mess_id']."' and channel_name='".$_SESSION['chname']."' ORDER BY mess_id ASC LIMIT 3)ORDER BY mess_id DESC");
							$r1009=mysqli_fetch_array($r1110);
							$_SESSION['mess_id']=$r1009['mess_id'];
					
							
							$r33=mysqli_query($conn,"select *from users_message WHERE mess_id > '".$_SESSION['mess_id']."' and channel_name='".$_SESSION['chname']."' ORDER BY mess_id ASC LIMIT 3");
							$r1003=mysqli_query($conn,"select *from users_message WHERE mess_id > '".$_SESSION['mess_id']."' and channel_name='".$_SESSION['chname']."' ORDER BY mess_id ASC LIMIT 3");
					
					
					$r1004=mysqli_fetch_array($r1003);
					$_SESSION['mess_id']=$r1004['mess_id'];
					
						
						
						
						}
					while($r34=mysqli_fetch_array($r33))
						{
	 
   
      

				?>				
				
				
			<div  class="row">			
				<div class="col-sm-2 text-center">
					<img src="user_images/<?php 
					
					$rnew=mysqli_query($conn,"select  *from users_info WHERE user_name = '".$r34['user_name']."'");
					$rnew2=mysqli_fetch_array($rnew);
					
					echo $rnew2['user_pic']; ?>" class="img-rounded" height="65" width="65">
				</div>
				<div id="<?php echo $r34['mess_id'];?>"  class="col-sm-10">
					<h4><?php echo $r34['user_name'];?><small style="margin-left:10px"><?php echo $r34['date'];?></small></h4>
					<p><?php echo $r34['messages'];?></p>
					
					<?php
					
					
					if($r34['post_img']!=NULL) {
					
					?>
					<img src="post_images/<?php

						
					
					echo $r34['post_img']; ?>" class="img-rounded" height="400" width="450">
					<br>
					<br>
					<?php
					
					}
					
					if($r34['format_code']!=NULL) {
					
					?>
					
					<pre class="prettyprint linenums">
					
					<?php echo $r34['format_code'];?>
					
					</pre>
					<?php
					
					}
					?>
					
					<br>
					
					<form action="index.php" method="post"> 
					
					<a href="#<?php echo $r34['mess_id'];?>"  data-toggle="popover"  data-html="true" data-placement="bottom" data-content='<form method="post" action="index.php"><textarea style="height:30px" name="popform" type="text"></textarea><br><button  name="subform" value="<?php echo $r34['mess_id'];?>" class="btn btn-danger btn-xs" type="">Post</button></form>'  >Reply</a> 
			
					<button style="margin-left:30px;margin-right:5px" class="btn btn-default btn-xs" type="submit" value="<?php echo $r34['mess_id'];?>" name="th_up"><span class="glyphicon glyphicon-thumbs-up"></span></button>
					<?php

						$reactionsup=mysqli_query($conn,"select thumbsup from reactions where mess_id='".$r34['mess_id']."' and reply_id=0");
						$sum = 0;
					
					while($r3461=mysqli_fetch_array($reactionsup))
						{
		
							$sum = $sum + $r3461['thumbsup'];
									
		
						}
						
						echo $sum;
					?>
			
					<button style="margin-left:30px;margin-right:10px" class="btn btn-default btn-xs" type="submit" value="<?php echo $r34['mess_id'];?>" name="th_down"><span class="glyphicon glyphicon-thumbs-down"></span></button>
					<?php

						$reactionsdown=mysqli_query($conn,"select thumbsdown from reactions where mess_id='".$r34['mess_id']."' and reply_id=0");
						$sum1 = 0;
					
					while($r3462=mysqli_fetch_array($reactionsdown))
						{
		
							$sum1 = $sum1 + $r3462['thumbsdown'];
									
		
						}
						
						echo $sum1;
					?>
			
			
					</form>
					
					
					
					<?php
					if($_SESSION['user_email']=="admin@super.com")    //for admin
					
					{
						
						
					?>
					<br>
					<form method="post" action="index.php">
					
					<button style=";margin-right:15px" class="btn btn-danger btn-xs" value="<?php echo $r34['mess_id']; ?>" name="admin_post" type="submit">Delete</button>
					
					</form>
					<?php
					
						}
					?>
					
					
				<hr>
		  
				</div>
		
			</div>
			<?php
			
			$r73=mysqli_query($conn,"select *from reply_message where mess_id='".$r34['mess_id']."' and channel_name='".$_SESSION['chname']."'");
					
					while($r74=mysqli_fetch_array($r73))
						{
	 
			$space=' ';
			
			?>
			
			
			
			<div  class="row">			
				<div id="textbox" class="col-sm-2 col-md-2"></div>
			
				<div style="margin-left:-30px" class="col-sm-2 col-md-2 text-center">
					<img src="user_images/<?php

					$rnew3=mysqli_query($conn,"select  *from users_info WHERE user_name = '".$r74['user_name']."'");
					$rnew4=mysqli_fetch_array($rnew3);
							
					
					echo $rnew4['user_pic']; ?>" class="img-rounded" height="65" width="65">
				</div>
				
				<div class="col-sm-8 col-md-8">
					<h4><?php echo $r74['user_name'];?><small style="margin-left:10px"><?php echo $r74['date'];?></small></h4>
					<p><?php echo $r74['message'];?></p>
					
					<br>
					
					
					

					<form action="index.php" method="post"> 
					
					
					
				<!--	<a href="#" data-toggle="popover"  data-html="true" data-placement="bottom" data-content='<form method="post" action="index.php"><textarea style="height:30px" name="popform" type="text"></textarea><br><button id="moveright" name="subform" value="<?php // echo $r74['mess_id'];?>" class="btn btn-danger btn-xs" type="">Post</button></form>'  >Reply</a> -->
					<button style="margin-left:30px;margin-right:5px" class="btn btn-default btn-xs" type="submit" value="<?php echo $r74['mess_id']; echo $space; echo $r74['reply_id']; ?>" name="th_up1"><span class="glyphicon glyphicon-thumbs-up"></span></button>
					<?php

						$reactionsups=mysqli_query($conn,"select thumbsup from reactions where mess_id='".$r74['mess_id']."' and reply_id='".$r74['reply_id']."'");
						$sum3 = 0;
					
					while($r4461=mysqli_fetch_array($reactionsups))
						{
		
							$sum3 = $sum3 + $r4461['thumbsup'];
									
		
						}
						
						echo $sum3;
					?>
			
					<button style="margin-left:30px;margin-right:5px" class="btn btn-default btn-xs" type="submit" value="<?php echo $r74['mess_id']; echo $space; echo $r74['reply_id']; ?>" name="th_down1"><span class="glyphicon glyphicon-thumbs-down"></span></button>
					<?php

						$reactionsdowns=mysqli_query($conn,"select thumbsdown from reactions where mess_id='".$r74['mess_id']."' and reply_id='".$r74['reply_id']."'");
						$sum4 = 0;
					
					while($r4462=mysqli_fetch_array($reactionsdowns))
						{
		
							$sum4 = $sum4 + $r4462['thumbsdown'];
									
		
						}
						
						echo $sum4;
					?>
			
					</form>
					
					
					<?php
					if($_SESSION['user_email']=="admin@super.com")    //for admin
					
					{
						
						
					?>
					<br>
					<form method="post" action="index.php">
					
					<button style=";margin-right:15px" class="btn btn-danger btn-xs" value="<?php echo $r74['reply_id'];?>" name="admin_reply" type="submit">Delete</button>
					
					</form>
					<?php
					
						} 
					?>
					
					
					
					
					
					
				<hr>
		  
				</div>
		
				
		
			</div>
			
			
		
		
		
		
		
				<?php
						}
				
				
					}
		   
		   
						   
				?>
					

                    </div>
                </div>
				
				<div class="row">
				<center>
					<ul class="pager">
					<?php
					
					$r3003=mysqli_query($conn,"select *from users_message where channel_name='".$_SESSION['chname']."'");
					$r3004=mysqli_fetch_array($r3003);
					if($_SESSION['mess_id']==$r3004['mess_id']){
						
					}
					else{
					echo '<li><a href="index.php?pagenum=2">Previous</a></li>';
					
					}
					
					if($_SESSION['page_num'] == 1){
					
					}
					
					else{
					echo '<li><a href="index.php?pagenum=3">Next</a></li>';
						
					}
					?>
					</ul>
				</center>
				</div>
				<br>
				<br>
				<div class="row" id="what"></div>
		
		
            </div>
        </div>
		
        <!-- /#page-content-wrapper -->
		
		
		                       <nav class="navbar navbar-fixed-bottom">
							
								    <div class="row">
										<div class="col-sm-3 col-md-3">
										</div>
										<div class="col-sm-9 col-md-9">
										
										
										
										<?php
										
										$unarchive = mysqli_query($conn,"(select archive_channel from archive where channels='".$_SESSION['chname']."' ORDER BY arch_id DESC)");
										$unarchive1=mysqli_fetch_array($unarchive);
										
										
										if($unarchive1['archive_channel']=="unarchive")
										{
											
										?>
											<form class="navbar-form" action="index.php" method="post" >
												<div class="row">
					<div class="input-group input-group-lg col-lg-10">
						
						<textarea type="text" name="message_post" class="form-control" placeholder="Message"></textarea>
						
						</div>
						<div  class="input-group input-group-btn col-lg-2">
								<button  style="margin-left:-5px" data-toggle="modal" data-target="#myModal10" class="btn btn-basic btn-lg" type="button">
									<span class="glyphicon glyphicon-plus"></span>
								</button>
							</div>
							<div  class="input-group input-group-btn col-lg-2">
								<button style="margin-left:5px" name="submit2" value="submit2" class="btn btn-success btn-lg" type="submit">
									Post
								</button>
							</div>
							
				</div>			
					
			</form>
			
			<?php
			
										}
										
										else {
			?>
	
	
								<form class="navbar-form" action="" method="" >
												<div class="row">
					<div class="input-group input-group-lg col-lg-10">
						
						<textarea type="text" name="" class="form-control" placeholder="Message"></textarea>
						
						</div>
						<div  class="input-group input-group-btn col-lg-2">
								<button  style="margin-left:-5px" data-toggle="modal" data-target="" class="btn btn-basic btn-lg" type="">
									<span class="glyphicon glyphicon-plus"></span>
								</button>
							</div>
							<div  class="input-group input-group-btn col-lg-2">
								<button style="margin-left:5px" name="submit2" value="submit2" class="btn btn-success btn-lg" type="">
									Post
								</button>
							</div>
							
				</div>			
					
			</form>
	
	
	
	
			<?php
			
										}
										
			$conn->close();							
			?>
				
	</div>
	</div>
	
</nav>




    </div>
	<!-- /#wrapper -->
	
	<script>
$(document).ready(function(){
	
    $('[data-toggle="popover"]').popover(); 
	
	
	$('html, body').animate({
        scrollTop: $('#what').offset().top
    });
	
	
	 $('[data-toggle="tooltip"]').tooltip();
	
	});
	
	
	
	function fill(Value) {
 
   //Assigning value to "search" div in "search.php" file.
 
   $('#search').val(Value);
 
   //Hiding "display" div in "search.php" file.
 
   $('#display').hide();
 
}
 
$(document).ready(function() {
 
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
 
   $("#search").keyup(function() {
 
       //Assigning search box value to javascript variable named as "name".
 
       var name = $('#search').val();
 
       //Validating, if "name" is empty.
 
       if (name == "") {
 
           //Assigning empty value to "display" div in "search.php" file.
 
           $("#display").html("");
 
       }
 
       //If name is not empty.
 
       else {
 
           //AJAX is called.
 
           $.ajax({
 
               //AJAX type is "Post".
 
               type: "POST",
 
               //Data will be sent to "ajax.php".
 
               url: "ajax.php",
 
               //Data, that will be sent to "ajax.php".
 
               data: {
 
                   //Assigning value of "name" into "search" variable.
 
                   search: name
 
               },
 
               //If result found, this funtion will be called.
 
               success: function(html) {
 
                   //Assigning result to "display" div in "search.php" file.
 
                   $("#display").html(html).show();
 
               }
 
           });
 
       }
 
   });
 
});

	/*
	function preview_image() 
{
 
	var total_file=document.getElementById("purl").value;
	   <?php $data1; ?>  	=  var total_file;
	    <?php  $data2 = file_get_contents($data1); 
		$new = 'new_image.jpeg';
		file_put_contents($new, $data2);   ?>
 
  $('#image_preview').append("<img src='img20.jpg' class='img-circle' height='65' width='65'><br>");
 
}
	*/
</script>
	
</body>

</html>
