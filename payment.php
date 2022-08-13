 <!DOCTYPE html>
<html>
<style>

	.payment{
	padding: 0 16px
	-ms-flex: 50%; /* IE10 */
	flex: 50%;
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

.icon-container img  {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;
  margin-left: 10%;
}

.top 
{
	 margin-left: 10%;
	 
}



</style>
<head>
	<meta charset = "UTF -8">
	<title>Payment</title>
	<link rel = "stylesheet" type="text/css" href="main.css">
	<link rel = "stylesheet" type="text/css" href="formcss.css">
</head>
<body>

<section class="s1">
	<div class="circle"></div>
		<header>
			
			<img src="pics/logo.png"></a>
			
			<ul>
				
				<li><a href="saloonspa.html">Back to Home Page</a></li>
			</ul>
			
		</header>
	
	
	
	</section>	

	  <div class="details">
      <h2>Payment and Billing Info</h2>
      </div>
	
	<div class="payment">
	
	
	<label for="card" class = "top">Accepted Cards</label>
	<div class="icon-container">
	<img src="cc.png">
	</div><br>
	<div class="container">
	<form action="" method="POST">
	
	<label for="cardname">Name on Card<label>
	<input type="text"id="cardname" name="cardname" placeholder="Name" required><br>
	
	<label for="cardnumber">Credit Card Number<label>
	<input type="text"id="cardnumber" name="cardnumber" placeholder="****-**-*****" required><br>
	
	<label for="expired">Expiration Date<label>
	<input type="text"id="expired" name="expired" placeholder="MM / YY" required>
	
	<label for="cv">CV Code<label>
	<input type="text"id="cv" name="cv" placeholder="CVV" required>
	
	
	
	
	<br><br><br>
	
	<div class="shipping">
	
	<label for="billing">Shipping Address<label><br><br>
	
	
	
	<label for="fname">Full Name</label>
    <input type="text" id="fname" name="full_name" placeholder="Recipient Name.." required><br>


	
	<label for="address">Address<label>
	<input type="text"id="address" name="address" placeholder="Recipient Address.." required><br>
	
	<label for="city">City<label>
	<input type="text"id="city" name="city" placeholder="City.." required><br>
	
	<label for="state">State<label>
	<input type="text"id="state" name="state" placeholder="State.." required><br>
	
	<label for="postcode">Postcode<label>
	<input type="postcode"id="postcode" name="post code.." placeholder=".." required><br>
	
	<input type="submit" name="insert" value="Submit">
	

	</div>
	</div>
	</form>
		</div>
	
</body>
</html>


<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'test_db');

if(isset($_POST['insert']))
{
	
$cardname = $_POST['cardname'];
$cardnumber = $_POST['cardnumber'];
$expired = $_POST['expired'];
$cv = $_POST['cv'];
$full_name = $_POST['full_name'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$postcode = $_POST['postcode'];


$query = "INSERT INTO payment (cardname, cardnumber, expired, cv, full_name, address, city, state, postcode)
values ('$cardname','$cardnumber', '$expired', '$cv', '$full_name','$address', '$city', '$state', '$postcode')";
	
	$query_run = mysqli_query($connection,$query);
	
	if($query_run)
	{
		echo ' <script type="text/javascript"> alert("Thank you for your purchase!") </script> ';
	}
	else
	{
		echo ' <script type="text/javascript"> alert("Data Not Saved") </script> ';
	}
	
}


?>