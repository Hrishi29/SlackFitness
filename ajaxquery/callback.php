<?php

session_start();//session starts here
require "init.php";

fetchData();

if(isset($_SESSION['user_name'])) {
   header("Location:index.php");	

}	


		
?>


