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
	<title>Book Now</title>
	<link rel = "stylesheet" type="text/css" href="main.css">
</head>

<body>
	<section class="s1">
	<div class="circle"></div>
		<header>
	
				<a href="index.php" class="logo"><img src="pics/logo.png"></a>
			<ul>

				<li><a href="index.php">Home Page</a></li>
				<li><a href="BookServices.html">Services Menu</a></li>
				<li><a href="contactus.php">Enquiries</a></li>
				<li><a href="bookingform.php">Book Now</a></li>

			</ul>
			
		</header>
	
	</section>	
      
	  <div class="details" id="Booking-Form">
        <h2>Booking Form</h2>
      </div>


<div class="container">
  
	<form action="" method="POST">
  
    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="first_name" placeholder="Your name.." required>

    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="last_name" placeholder="Your last name.." required>
    
    <label for="lname">Contact Number:</label>
    <input type="text" id="cnumber" name="phone" placeholder="Your phone number.." required>
    
    <label for="email">Email Address:</label>
	<input type="text" id="email" name="email" placeholder="example: lyn@gmail.com" required>
  	
	
	<label for="serviceType">Service Type</label>
    
	<select name="service_type">
      
	  <option value="">---Type---</option>

	  <option value="Hair Cut">Cutting & Trimming</option>
      <option value="Hair Relaxing">Relaxing & Rebonding</option>
      <option value="Hair Bleach">Bleaching & Colouring</option>
      <option value="Manicure">Manicure</option>
      <option value="Pedicure">Pedicure</option>
      <option value="Menipedi">Meni Pedi</option>
      <option value="Relax Spa">Spa Relaxing Package</option>
	  <option value="Wedding Package">Pre-Wedding Package</option>
      <option value="Student Package">Student Package</option>
    
	</select>

    <label for="bookingdate">Booking Date Service</label> <br>
	<input type="date" name="bookingdate" required>
  	
    <br>
    <label for="timeslot">Appointment Time Service</label>
	
	<select name="timeslot">
      
	  <option value="">---Time---</option>
	  
	  <option value="10AM">10:00 AM</option>
      <option value="12PM">12:00 PM</option>
      <option value="230PM">2:30 PM</option>
      <option value="3PM">3:00 PM</option>
      <option value="4PM">4:00 PM</option>
      <option value="530PM">5:30 PM</option>
      <option value="7PM">7:00 PM</option>
	
    </select>

	

    <label for="addrequest">Additional Request/Comments</label>
    <textarea id="addrequest" name="message" placeholder="Anything you would like to add on? " style="height:100px" required></textarea>

    <input type="submit" name="insert" value="Submit">
 </form>
  
</div>

</body>

</html>

<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'test_db');

if(isset($_POST['insert']))
{
	
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$service_type = $_POST['service_type'];
	$bookingdate = $_POST['bookingdate'];
	$timeslot = $_POST['timeslot'];
	$message = $_POST['message'];
	
	$query =  "INSERT INTO booking (first_name, last_name, phone, email, service_type, bookingdate, timeslot, message)
				values ('$first_name','$last_name', '$phone', '$email', '$service_type', '$bookingdate', '$timeslot', '$message')";
	
	$query_run = mysqli_query($connection,$query);
	
	if($query_run)
	{
		echo ' <script type="text/javascript"> alert("Thank you for booking with us!") </script> ';
	}
	else
	{
		echo ' <script type="text/javascript"> alert("Data Not Saved") </script> ';
	}
	
}




?>
