<?php

$con = mysqli_connect("localhost","root","","test_db");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
?>

<?php

session_start();
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$arrbag = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_bag"])) {
	$_SESSION["shopping_bag"] = $arrbag;
	
}
else{
	$array_keys = array_keys($_SESSION["shopping_bag"]);
	if(in_array($code,$array_keys)) 
	{
		
	} 
	else 
	{
	$_SESSION["shopping_bag"] = array_merge($_SESSION["shopping_bag"],$arrbag);
	
	}

	}
	

	
}
?>



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
</style>
<head>
<title>Add To Cart</title>
<link rel='stylesheet' href='css/stylo.css' type='text/css'  />
<link rel='stylesheet' href='css/main.css' type='text/css'  />
</head>
<body>
<section class="s1">
	<div class="circle"></div>
		<header>
	
			<a href="saloonspa.html" class="logo"><img src="pics/logo.png"></a>
			<ul>
				<li><a href="addcart.php">Shop</a></li>
				<li><a href="saloonspa.html">Home Page</a></li>
				<li><a href="BookServices.html">Services Menu</a></li>
				<li><a href="contactus.php">Enquiries</a></li>
				<li><a href="bookingform.php">Book Now</a></li>
				<li><a href="indexcust.php">Photos</a></li>
				<li><a href="login.php">Staff Log-In</a></li>
			</ul>
			
		</header>
	
	
	
	</section>	
	<section class="s3" id = "s3">
<div style="width:700px; margin:50 auto;">

<h2>Shopping Cart</h2>   

<?php
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_bag"])) {
	foreach($_SESSION["shopping_bag"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_bag"][$key]);
		$status = "<div class='message_box' style='color:#AA6F5D;  font-weight: 400; margin:10px 0px;'>
		Product removed from shopping bag!</div>";
		}
		if(empty($_SESSION["shopping_bag"]))
		unset($_SESSION["shopping_bag"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_bag"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; 
    }
}
  	
}

?>

<?php
if(!empty($_SESSION["shopping_bag"])) {
$countbag = count(array_keys($_SESSION["shopping_bag"]));
?>
<div class="divbag">

<img src="cart-heart.png" /> 
♡ Bag 
♡
<span><?php echo $countbag; ?></span>
</div>
<?php
}
?>

<div class="bag">
<?php
if(isset($_SESSION["shopping_bag"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_bag"] as $product){
?>
<tr>
<td><img src='<?php echo $product["image"]; ?>' width="70" height="60" /></td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<button onclick="location.href = 'payment.php'" type='submit' class='pay'>Pay</button>
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Your bag is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>


<?php echo $status; ?>



<br /><br />

</div>
</section>	

<section>
<div class= "shop" style="width:700px; margin:50 auto;">

<h2>Products</h2>   

<?php
if(!empty($_SESSION["shopping_bag"])) {
$countbag = count(array_keys($_SESSION["shopping_bag"]));
?>

<?php
}

$result = mysqli_query($con,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image' ><img src='".$row['image']."'/></div>
			  <div class='name'>".$row['name']."</div>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form>
		   	  </div>";
        }
mysqli_close($con);
?>

<div style="clear:both;"></div>


<br /><br />
</div>

</section>	
</body>
</html>

