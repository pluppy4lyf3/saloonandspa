<!DOCTYPE html>
<html>
<head>
	<title>Salon & Spa</title>
	<link rel="stylesheet" type="text/css" href="registerstyle.css">
</head>
<body>

		<h2>WELCOME TO SPA-Q</h2>

<div class="container">


     <form action="signup-check.php" method="POST">
     	
		<h1 class="formtitle">Create Account</h1>
		
     	
		<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>


          
		  <div class="forminputgroup">
          <?php if (isset($_GET['username'])) { ?>
               <input type="text" 
					  class="forminput"
                      name="username" 
                      placeholder="Username"
                      value="<?php echo $_GET['username']; ?>">
          <?php }else{ ?>
               <input type="text" 
					  class="forminput"
                      name="username" 
                      placeholder="Username">
          <?php }?>
			</div>


          <div class="forminputgroup">
          <?php if (isset($_GET['email'])) { ?>
               <input type="text" 
					  class="forminput"
                      name="email" 
                      placeholder="Email"
                      value="<?php echo $_GET['email']; ?>">
          <?php }else{ ?>
               <input type="text"
					  class="forminput"
                      name="email" 
                      placeholder="Email">
          <?php }?>
			</div>


     	<div class="forminputgroup">
			<input type="password" 
				 class="forminput"
                 name="password" 
                 placeholder="Password">
		</div>
         
		 <div class="forminputgroup">
          <input type="password"
				class="forminput"
                 name="re_password" 
                 placeholder="Confirm Password">
		</div>


     	<button class="formbutton" name="signup" type="Submit">Sign Up</button>
		
          <p class="formtext">
			<a href="login.php" class="formlink">Already have an account? Sign in</a>
		  </p>
		  
		  
     </form>
	 
	 </div>
	 
</body>
</html>