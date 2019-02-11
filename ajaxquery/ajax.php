

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Slack</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><!-- getting the bootstrap css file for predefined components  -->
	<link rel="icon" type="image/jpg" href="https://static8.depositphotos.com/1010751/1032/v/950/depositphotos_10323838-stock-illustration-fitness-logo.jpg">
	
	<style>
	
	li:hover {
 
   cursor: pointer;
   background-color: blue;
   color: white;
	}
	
	</style>
	</head>



<?php

if (isset($_POST['search'])) {
 

 
$conn = mysqli_connect("localhost","root","");  //database connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     } 
	
	mysqli_select_db($conn,'slack');  // selecting database
//Search box value assigning to $Name variable.
 
   $Name = $_POST['search'];
  
 
//Search query.
 
   $Query =mysqli_query($conn, "SELECT user_name FROM users_info WHERE user_name LIKE '%$Name%' LIMIT 3");
 
//Query execution
 
   
 
//Creating unordered list to display result.
 
  
   //Fetching result from database.
 
   
  
   echo '
 <div class="container">
 <div class="row">
 <div class="col-md-4">
<ul style="margin-top:-10px; margin-left:-4px; width:297px"  class="list-group" style="list-style: none;>
 
   ';
 
   //Fetching result from database.
 
   while ($Result = mysqli_fetch_array($Query)) {
 
       ?>
 
   <!-- Creating unordered list items.
 
        Calling javascript function named as "fill" found in "script.js" file.
 
        By passing fetched result as parameter. -->
 
   <li class="list-group-item" onclick='fill("<?php echo $Result['user_name']; ?>")'>
 
   
 
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
 
       <?php echo $Result['user_name']; ?>
 
   </li>
 
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
 
   <?php
 
}}
 
 
?>
 
</ul>
</div>
</div>
</div>