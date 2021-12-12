<?php 
include('dbcon.php');
include('session.php'); 

$result=mysqli_query($con, "select * from users where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

 ?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Home</title>
</head>
<body>

     <center><h3>Welcome: <?php echo $row['username']; ?> </h3></center>
    <nav>
        <a href="insertNote.php" /> Insert Note
        <a href="uploadPhoto.php"/>Upload Photo
        <a href="forgot_password.php"/>Change Password
        <a href="profile.php"/>Profile
        <a href="logout.php">Log out</a>
    </nav> 



</body>
</html>

