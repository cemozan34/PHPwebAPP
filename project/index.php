<?php session_start(); 

include('dbcon.php'); 


?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form-wrapper">
  
  <form action="#" method="post">
    <h3>Login here</h3>
	
    <div class="form-item">
		<input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="pass" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
  </form>
  <?php
	if (isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($con, $_POST['user']);
			$password = mysqli_real_escape_string($con, $_POST['pass']);
			
			$query 		= mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			

			if (password_verify($password, $row["password"])) {
				$_SESSION['user_id']=$row['user_id'];
				$session_id=$_SESSION['user_id'];
				/*$filename = "./logs/logins.txt";
				chmod($filename,0777);
				$file = fopen( $filename, "a" );
				if( $file == false ) {
					echo ( "Error in opening file" );
					exit();
				}
				else{
					$query5 = 'SELECT * FROM users WHERE user_id = '.$session_id;  
					$results = mysqli_query($con, $query5);  
					$rows = mysqli_fetch_array($results);
					date_default_timezone_set("Europe/Istanbul");  
					fwrite( $file, $rows["username"]." logged in ". date("Y/m/d")." ".date("h:i:sa")."\n");
				}
				fclose( $file );*/
				header('location:home.php');
			} else {
				echo 'Invalid Username and Password Combination';
			}
		}
  ?>
  <div class="reminder">
    <p>Not a member? <a href="signup.php">Sign up now</a></p>
    <p><a href="forgot_password.php">Forgot password?</a></p>
  </div>
  
</div>

</body>
</html>