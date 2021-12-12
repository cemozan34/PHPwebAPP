<?php 
include('dbcon.php');
include('session.php'); 

$result=mysqli_query($con, "select * from users where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" type="text/css" href="profile.css">
    
    <title>Profile</title>
</head>

<body>
<div class="container d-flex justify-content-center">
    <div class="card p-3 py-4">
        <div class="text-center"> <img src="https://i.imgur.com/stD0Q19.jpg" width="100" class="rounded-circle">
            <h3 class="mt-2"><?php echo $row["username"];?></h3>
            <div class="row mt-3 mb-3">
                <div class="col-md-4">
                    <h5><a style="color:white;" href="uploadPhoto.php">Photos</a></h5> <span class="num">
                        <?php  
                            $numberOfPhotos = 0;
                            $query = 'SELECT * FROM tbl_images WHERE user_id = '.$session_id;  
                            $result1 = mysqli_query($con, $query);  
                            while($row = mysqli_fetch_array($result1))  
                            {  
                                $numberOfPhotos++;
                            } 
                            echo $numberOfPhotos; 
                        ?>  </span>
                </div>
                <div class="col-md-4">
                    <h5><a style="color:white;" href="insertNote.php">Notes</a></h5> <span class="num">
                        <?php  
                            $numberOfNotes = 0;
                            $query = 'SELECT * FROM tbl_texts WHERE user_id = '.$session_id;  
                            $result1 = mysqli_query($con, $query);  
                            while($row = mysqli_fetch_array($result1))  
                            {  
                                $numberOfNotes++;
                            } 
                            echo $numberOfNotes; 
                        ?> 
                    </span>
                </div>
                <div class="col-md-4">
                    <h5>Total</h5> <span class="num"><?php echo $numberOfPhotos + $numberOfNotes?></span>
                </div>
            </div>
            <div class="profile mt-5"> <button class="profile_button px-5"><a style="color:white;" href="changePassword.php">Change Password</a></button> </div>
        </div>
    </div>
</div>
</body>
</html>