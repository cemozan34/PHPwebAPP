<?php include('dbcon.php'); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="form-wrapper" style="text-align:center;">>
  
  <form method="post">
    <h3>signup here</h3>
	
    <div class="form-item">
		<input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
    </div>

    <div class="form-item">
		<input type="email" name="email" required="required" placeholder="E-Mail" required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="pass" required="required" placeholder="Password" required></input>
    </div>

    <div class="form-item">
		<input type="text" name="secretWord" required="required" placeholder="Enter your secret word" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="btn btn-primary" title="Sign Up" name="signup" value="signup"></input>
    </div>

    <div class="form-item">
		<a href="index.php"/> Log in
    </div>
    
  </form>
  
</div>

<?php
	if (isset($_POST['signup']))
		{
			$username = $_POST['user'];
			$password = $_POST['pass'];
      $email = $_POST['email'];
      $secretWord = $_POST['secretWord'];

      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


			$query = "INSERT INTO users(username,password,email,secret_word) VALUES ('$username','$hashedPassword','$email','$secretWord')";
			$query2 = "SELECT * FROM users WHERE username = "."'".$username."'"." AND email = "."'".$email."'";
	


      $query3 		= mysqli_query($con,$query2);
			$num_row 	= mysqli_num_rows($query3);

      if ($num_row > 0) 
        {			
            echo '<script>alert("Account already exists!")</script>'; 
        }
			else
				{
          if(mysqli_query($con, $query)){
              echo '<script>alert("Signed Up Successfully")</script>'; 
          }
				}
		}
  ?>

</body>
</html>
  