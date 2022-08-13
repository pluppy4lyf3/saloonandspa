<!DOCTYPE html>
<head>

    <title>Salon & Spa</title>
    <link rel="stylesheet" href="registerstyle.css">
	
</head>

<h2>WELCOME TO SPA-Q</h2>
<div class="container">


<body>
     <form action="signin-check.php" method="POST">
     	
		<h1 class="formtitle">Login</h1>
		
		
     	<?php 
			if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
		
		
     	<div class="forminputgroup">
     	<input type="text"
				class="forminput"
				name="username" 
					placeholder="Username">
		</div>
     	
     	<div class="forminputgroup">
		<input type="password"
				class="forminput"
				name="password" 
					placeholder="Password">
		</div>


		<button class="formbutton" name="login" type="Submit">Login</button>
			
		<p class="formtext">
			<a href="register.php" class="formlink">Create an account</a>
		 </p>
			
        
     
	 </form>
	 
</body>

</div>
</html>




