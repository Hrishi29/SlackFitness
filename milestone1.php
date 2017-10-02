




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Slack</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><!-- getting the bootstrap css file for predefined components  -->
</head>


<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-4 col-md-offset-2">
				<?php




if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if(isset($_POST['submit'])){
	
	$search = $_POST["search"];
	
  $search = trim($search);
  $search = stripslashes($search);
  $search = htmlspecialchars($search);
  
  
  
	mysqli_connect("localhost","root","") or die(mysql_error());
    mysqli_select_db("slack");
	
	$r1=mysql_query("select workspace from users where workspace='".$search."'");
    $r2=mysql_fetch_array($r1);
	
	 if($r2['workspace']!=$search)
	
	{
		
	
	?>
	
				<h2>Error</h2>
	
	<?php
	}
	
	else
	{
	
	header("Location: signin.php");
	
	
	
	}
}
?>
				
				<h2>Sign in to your workspace</h2>
					<p>Enter your workspace’s Slack URL.</p>
						<form  class="form-horizontal" method="post" action="milestone1.php">
							<div class="input-group">
								
									<input id="workspace" type="text"  placeholder="your-workspace-url" name="search" required />
											<label for="workspace" class="control-label">someone@example.com</label>
							</div>
								<br>
									<div class="input-group" >
											<button class="btn btn-success" name="submit" value="submit" type="submit">Continue -></button>
									</div>
							
						</form>
									
									
										
									
							
						
			
		
			</div>
		</div>
	</div>
</body>
</html>