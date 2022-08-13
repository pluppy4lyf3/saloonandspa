<!DOCTYPE html>
<html>

<head>
	<meta charset = "UTF -8">
	<title>Bookings</title>
	
	<link rel = "stylesheet" type="text/css" href="main.css">
	<link rel = "stylesheet" type="text/css" href="formcss.css">

<style>
		
		table, td, th{
		
			border: 1px solid black;
			
		}
		

		table{
			
			width: 60%;
			border-collapse: collapse;
			margin-left: auto;
			margin-right: auto;
			margin-top: 50px;
			margin-bottom: 10%;
			background-color: pink;
			
		}
		
		form{
			
			margin-top: 12%;
			
		}
		
		.container{
		width:80%;
		margin: 0 auto;
		border-radius: 5px;
		background-color: #f2f2f2;
		padding: 20px
		}
		
		.details{
		text-align: center;
		}

		.details h2{
		color:#333;
		font-size:3em;
		margin: 0;
		}
		
		.top{
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: #EBCFC4;
		
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Poppins',sans-serif;
		}
		
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
		
	</style>

</head>


<body>
			<section class="s1">
	<div class="circle"></div>
		<header>
	
			<a href="saloonspa.html" class="logo"><img src="pics/logo.png"></a>
			<ul>
				
				<li><a href="saloonspastaff.html">Home Page</a></li>
				<li><a href="staffservices.html">Services Menu</a></li>
				<li><a href="enquires.php">Enquiries</a></li>
				<li><a href="bookingform-staff.php">Bookings</a></li>
				<li><a href="index.php">Upload Photo</a></li>
				<li><a href="saloonspa.html">Log Out</a></li>
			</ul>
			
		</header>
	
	
	
	</section>	
			
			
			
			<div class="details">
			<h2>Booking Form Data</h2>
			</div>
			
			<div class="container">
			<form action="" method="POST">
			
				ID To Update: <input type="number" name="id" required><br>
				New Phone: <input type="text" name="phone"><br>
				New Email: <input type="text" name="email"><br>
				New Service Type: <input type="text" name="service_type"><br>
				New Time Slot: <input type="text" name="timeslot"><br><br>
			
				<input type="submit" name="update" value="Update Data">
			
			</form>
			</div>




<?php

$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "test_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}


//display output
$sql = "SELECT id, first_name, last_name, phone, email, service_type, bookingdate, timeslot, message FROM booking";
$result = $conn->query($sql);

if ($result->num_rows > 0){
	
	//output data of each row
	echo "<table>";
		while($row = $result->fetch_assoc()) {
			echo "<tr><td> ID: " . $row["id"]. " </td><td> Name: " . $row["first_name"]. " " . $row["last_name"]. " </td>
				<td> Phone: " . $row["phone"]. " <td> Email: " . $row["email"]. " <td> Service Type: " . $row["service_type"]. " <td> Date: " . $row["bookingdate"]. " <td> Time Slot: " . $row["timeslot"]. " <td> Message: " . $row["message"]. "</td><tr>";
		}
	echo "</table>";
} else {
	
	echo "0 results";
}		

if(isset($_POST['update']))
{
	
	$id = $_POST['id'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$service_type = $_POST['service_type'];
	$timeslot = $_POST['timeslot'];
	
	
	
	// mysql update query 
    $q = "UPDATE `booking` SET `phone`='".$phone."',`email`='".$email."',`service_type`='".$service_type."',`timeslot`='".$timeslot."' WHERE `id` = $id";
	
	$result = mysqli_query($conn, $q);
	
	if($result)
    {
        echo ' <script type="text/javascript"> alert("Data updated") </script> ';
    }else{
        echo ' <script type="text/javascript"> alert("Data updated") </script> ';
    }
	
}
	

mysqli_close($conn);

	

?>
</body>
</html>