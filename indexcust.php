<?php
 $msg ="";
  // If upload button is clicked ...
  if (isset($_POST['upload']))
  {
	  
	 // image file directory (where image goes)
  	$target = "images/".basename($_FILES['image']['name']);
	
  	// connect to db
  	$db = mysqli_connect("localhost","root","","test_db");
	
	
  	// Get all the submitted data from the form
	$image = $_FILES['image']['name'];
  	$text = $_POST['text'];

  	
  	$sql = "INSERT INTO images (image, text) VALUES ('$image', '$text')";
  	mysqli_query($db, $sql);  //store submitted data into database table images[in localhost]

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
<title>Reviews</title>
<link rel="stylesheet" type="text/css" href="index.css">
<link rel="stylesheet" type="text/css" href="main.css">

</head>
<body>

<section class="s1">
	<div class="circle"></div>
			<header>
	
			<a href="saloonspastaff.html" class="logo"><img src="pics/logo.png"></a>
			<ul>
				<li><a href="addcart.php">Shop</a></li>
				<li><a href="saloonspa.html">Home Page</a></li>
				<li><a href="BookServices.html">Services Menu</a></li>
				<li><a href="contactus.php">Enquiries</a></li>
				<li><a href="bookingform.php">Book Now</a></li>
				<li><a href="indexcust.php">Photos</a></li>
				<li><a href="login.php">Staff Login</a></li>

			</ul>
			
		</header>
	
	
	
	</section>	
<section class="s3">	
	
<div id="content">

<!-- untuk tarik data from db masukkan ke html (kot i think)-->
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


</div>
</section>	
</body>

</html>