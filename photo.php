<?php
 $msg ="";
  // If upload button is clicked ...
  if (isset($_POST['upload']))
  {
	  
	 // image file directory
  	$target = "images/".basename($_FILES['image']['name']);
	
  	// connect to db
  	$db = mysqli_connect("localhost","root","","test_db");
	
	
  	// Get all the submitted data from the form
	$image = $_FILES['image']['name'];
  	$text = $_POST['text'];

  	
  	$sql = "INSERT INTO images (image, text) VALUES ('$image', '$text')";
 
  	mysqli_query($db, $sql); //store submitted data into database table images[in localhost]
	
	//moves uploaded images into a new file [name: images]
  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}
	else
	{
  		$msg = "Failed to upload image";
  	}
  }
 
?>

<!DOCTYPE html>
<html>
<style>
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
</style>
<head>
<title>Image Upload</title>
<link rel="stylesheet" type="text/css" href="photo.css">
<link rel="stylesheet" type="text/css" href="main.css">

</head>
<body>

<section class="s1">
	<div class="circle"></div>
			<header>
	
			<a href="saloonspastaff.html" class="logo"><img src="pics/logo.png"></a>
			<ul>
				
				<li><a href="saloonspastaff.html">Home Page</a></li>
				<li><a href="staffservices.html">Services Menu</a></li>
				<li><a href="enquires.php">Enquiries</a></li>
				<li><a href="bookingform-staff.php">Bookings</a></li>
				<li><a href="photo.php">Upload Photos</a></li>
				<li><a href="saloonspa.html">Log Out</a></li>

			</ul>
			
		</header>
	
	
	
	</section>	
<section class="s3">
<div id="content">
<?php 
	$db = mysqli_connect("localhost","root","","test_db");
	$sql = "SELECT * FROM images";
	$result = mysqli_query($db, $sql);
	while($row = mysqli_fetch_array($result)){
		echo"<div id = 'img_div'>";
		echo"<img src='images/".$row['image']."'>";
		echo "<br><br><br><p>".$row['text']."</p>";
		echo "</div>";
		
	}
?>
 
 <!-- form to submit data from laptop to html to localhost db -->
  <form method="POST" action="photo.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image" >
  	</div>
  	<div>
      <textarea name="text" cols="40" 	rows="4" placeholder=" Image Caption"></textarea>
		
  	</div>
  	<div>
  		<input class= "submit" type="submit" name="upload" value="  Post  ">
  	</div>
  </form>
</div>
</section>
</body>
</html>