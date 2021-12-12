<?php include('dbcon.php'); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Forgot Password</title>
</head>
<body>
<div class="form-wrapper">
  
  <form method="post">
    <h3>Forgot Password</h3>
	
    <div class="form-item">
		<input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
    </div>

    <div class="form-item">
		<input type="text" name="email" required="required" placeholder="E-Mail" required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="newPassword" required="required" placeholder="New Password" required></input>
    </div>

    <div class="form-item">
		<input type="text" name="secretWord" required="required" placeholder="Enter your secret word" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Sign Up" name="signup" value="Change Password"></input>
    </div>

    <div class="form-item">
		<a href="index.php"/> Log in
    <a href="signup.php"/> Sign up
    </div>
    
  </form>
  
</div>

<?php
	if (isset($_POST['signup']))
		{
			$username = $_POST['user'];
			$newPassword = $_POST['newPassword'];
      $email = $_POST['email'];
      $secretWord = $_POST['secretWord'];

      $hashednewPassword = password_hash($newPassword, PASSWORD_DEFAULT);


			
			$query2 = "SELECT * FROM users WHERE username = "."'".$username."'"." AND email = "."'".$email."'";
      $query3 		= mysqli_query($con,$query2);
			$num_row 	= mysqli_num_rows($query3);

      if ($num_row > 0) 
        {			
          $sql = "UPDATE users SET password = "."'".$hashednewPassword."'"." WHERE username= "."'".$username."'"." AND email = "."'".$email."'";
          if(mysqli_query($con,$sql)){
            echo '<script>alert("Password has been changed!")</script>';
          }
          else{
            echo '<script>alert("Password could not be changed!")</script>'; 
          }
        }
			else
				{
          if(mysqli_query($con, $query2)){
              echo '<script>alert("Account does not exist!")</script>'; 
          }
				}
		}
  ?>

</body>
</html>
  
