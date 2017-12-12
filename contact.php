<?php
// Start the session
session_start();
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
<style>
input[type=text], input[type=number], input[type=email], textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

      #map {
        height: 400px;
        width: 800px;
       }
    </style>
	</head>

<body>


<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a style="font-weight:bold; font-family: 'Salsa'; font-size:2.5em; color:orange" class="navbar-brand" href="index.php">Fitness</a>
    </div>
   <!-- <ul class="nav navbar-nav navbar-right">
      
      <li><a style="color:red" href="signout.php"><span class="glyphicon glyphicon-log-in"></span> Sign Out</a></li>
    </ul> -->
  </div>
</nav>
<br>
<br>
<br>
<br>
<div class="container">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<center>
<h2>Contact Us!</h3>
</center>
<div id="map"></div>
</div>
<div class="col-md-2"></div>
</div>
</div>
<?php
	
			include 'connect.php'; // database connection

			if ($_SERVER["REQUEST_METHOD"] == "POST") {		
	
				include 'query.php'; // run through queries
				
			}
	?>
<div class="container">
<form action="contact.php" method="post">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="contact_no">Contact Number</label>
    <input type="number" id="contact_no" name="contactno" placeholder="Your contact number..">

    <label for="emailid">Email Id</label>
    <input type="email" id="emailid" name="email_id" placeholder="Your email id.." required>

	
    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="How we may help you?.." style="height:200px" required></textarea>

    <input type="submit" value="Submit" name="contact_submit">
  </form>


</div>
<script>
      function initMap() {
        var uluru = {lat: 36.885, lng: -76.305};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
<!-- Replace the value of the key parameter with your own API key. -->
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjcjt6Ll_MHdS8woi1tpw9qVZfMSESAS8&callback=initMap">
</script>

</body>
</html>