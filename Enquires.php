<!DOCTYPE html>
<html>

<head>
	<meta charset = "UTF -8">
	<title>Enquires</title>
	<link rel = "stylesheet" type="text/css" href="main.css">
	<link rel = "stylesheet" type="text/css" href="formenq.css">

	
	<style>
		
		table, td, th
		{
		
			border: 3px solid #88AED0;
			padding: 8px;
			
			
		}
		
		tr:nth-child(even)
		{background-color: #f2f2f2;}
		
		tr:hover 
		{background-color: #FFFFEA;
		cursor: no-drop;}
		
		th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: center;
		background-color: #AEC6CF;
		color: white;
			}

		table{
			
			width: 80%;
			border-collapse: collapse;
			
			margin-left: auto;
			margin-right: auto;
			margin-top: 300px;
			
			}
		
		form{
			
			margin-top: 10%;
			margin-left: 10%;
			position: center;
			
			}
		
		
	
	</style>
	
	
</head>

<body>

			<header>
	
		<div class="circle"></div>
	
			<a href="saloonspastaff.html" class="logo"><img src="pics/logo.png"></a>
			<ul>
				
				<li><a href="saloonspastaff.html">Home Page</a></li>
				<li><a href="staffservices.html">Services Menu</a></li>
				<li><a href="enquires.php">Enquiries</a></li>
				<li><a href="bookingform-staff.php">Bookings</a></li>
				<li><a href="index.php">Upload Photos</a></li>
				<li><a href="saloonspa.html">Log Out</a></li>

			</ul>			
		
	
			</header>

			





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
$sql = "SELECT id, first_name, last_name, email, phone, message FROM contacts";
$result = $conn->query($sql);

if ($result->num_rows > 0){
	
	//output data of each row
	echo "<table> <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
	<th>E-mail</th>
	<th>Phone num</th>
	<th>Enquiry</th>
  </tr>";
	
		while($row = $result->fetch_assoc()) {
			echo "<tr><td> " . $row["id"]. " </td><td> " . $row["first_name"]. "  </td><td> " . $row["last_name"]. " </td>
				<td> " . $row["email"]. " <td> " . $row["phone"]. " <td> " . $row["message"]. "</td><tr>";
		}
	echo "</table>";
} else {
	
	echo "0 results";
}		

if(isset($_POST['delete']))
{

    
    // get id to delete
    $id = $_POST['id'];
	
	// connect to mysql
    $conn = mysqli_connect($sname, $unmae, $password, $db_name);
	
	
    // mysql delete query 
    $q = "DELETE FROM `contacts` WHERE `id` = $id";
    
    $result = mysqli_query($conn, $q);
    
    if($result)
    {
        echo ' <script type="text/javascript"> alert("Data deleted") </script> ';
    }else{
        echo ' <script type="text/javascript"> alert("Data not deleted") </script> ';
    }
	
	
}
	

mysqli_close($conn);


?>


<form action="" method="POST">
			
				ID TO DELETE: &nbsp; <input type="number" name="id" placeholder="ID" required><br><br>
			
				
				<div>
				
		
					<input type="submit" name="delete" value="Delete">
		
				
				</div>
			
			
			</form>



</body>
</html>