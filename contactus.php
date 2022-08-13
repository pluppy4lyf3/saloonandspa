<!DOCTYPE html>
<html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.s1
{
position: sticky;
	width: 100%;
	min-height: 15vh;
	padding: 35px;
	display:flex;
	justify-content: space-between;
	align-items: center;
	background: #fff;
}

.s3{
position: relative;
	width: 100%;
	min-height: 50vh;
	padding: 35px;
	display:flex;
	justify-content: space-between;
	align-items: center;
	background: #fff;
	}
	
input[type=text], select, textarea {
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
</style>

<head>
	<meta charset = "UTF -8">
	<title> Contact Us</title>
	<link rel = "stylesheet" type="text/css" href="main.css">
	<link rel = "stylesheet" type="text/css" href="ContactUs.css">
</head>

<body>
	<section class="s1">
	<div class="circle"></div>
		<header>
	
		<a href="saloonspa.html" class="logo"><img src="pics/logo.png"></a>
			<ul>

				<li><a href="saloonspa.html">Home Page</a></li>
				<li><a href="BookServices.html">Services Menu</a></li>
				<li><a href="contactus.php">Enquiries</a></li>
				<li><a href="bookingform.php">Book Now</a></li>

			</ul>
			
		</header>
	
	</section>	
      <div class="details" id="Feedback-Form">
        <h2>Enquiries</h2>
      </div>


<div class="container">
  
  <form action="" method="POST">
    
	<label for="fname">First Name</label>
    <input type="text" id="fname" name="first_name" placeholder="Your name..." required>

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="last_name" placeholder="Your last name..." required>

    <label for="Email">Email Adress</label>
    <input type="text" id="Email" name="email" placeholder="Your email..." required>    
	
	<label for="Phone No">Phone No</label>
    <input type="text" id="phone" name="phone" placeholder="Your contact number..." required> 
	
    <label for="subject">Message</label>
    <textarea id="subject" name="message" placeholder="Write something..." style="height:200px" required></textarea>

    <input type="submit" name="insert" value="Submit">
  </form>
</div>
	
</body>

<footer>
<div class="Address">
	<p> SaloonSpa </p>
	<p> Design Sdn. Bhd.</p>
	<p> No.50, Jalan E1/2 Kawasan Industries Kepong, </p>
	<p> 52100 Kuala Lumpur.</p>	
</div>

<div class="phone">
	<img src="pics\phone.png" class="phoneimg" ALIGN="left">
	<p>+6012-3456789</p>	
</div>

<div class="OpenHr">
	<p>OPENING HOURS</p>
	<p>Monday - Friday: 10:00am ~ 8:00PM </p>
	<p>Saturday - Sunday: 10:00am ~ 5:00PM</p>
</div>

<div class="email">
	<img src="pics\email.png" class="emailimg" ALIGN="left">
	<p>S.Spa@gmail.com</p>
</div>
</footer>

</html>


<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'test_db');

if(isset($_POST['insert']))
{
	
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$query = "INSERT INTO contacts (first_name, last_name, email, phone, message)
values ('$first_name','$last_name', '$email', '$phone', '$message')";
	
	$query_run = mysqli_query($connection,$query);
	
	if($query_run)
	{
		echo ' <script type="text/javascript"> alert("We will be contacting you shortly!") </script> ';
	}
	else
	{
		echo ' <script type="text/javascript"> alert("Data Not Saved") </script> ';
	}
	
}




?>