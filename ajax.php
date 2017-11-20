
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
 
   $Query =mysqli_query($conn, "SELECT user_name FROM users_info WHERE user_name LIKE '%$Name%'");
 
//Query execution
 
   
 
//Creating unordered list to display result.
 
  
   //Fetching result from database.
 
   
  
   echo '
 
<ul>
 
   ';
 
   //Fetching result from database.
 
   while ($Result = mysqli_fetch_array($Query)) {
 
       ?>
 
   <!-- Creating unordered list items.
 
        Calling javascript function named as "fill" found in "script.js" file.
 
        By passing fetched result as parameter. -->
 
   <li onclick='fill("<?php echo $Result['user_name']; ?>")'>
 
   <a>
 
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
 
       <?php echo $Result['user_name']; ?>
 
   </li></a>
 
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
 
   <?php
 
}}
 
 
?>
 
</ul>