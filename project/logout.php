<?php
include('dbcon.php');
session_start();
$session_id=$_SESSION['user_id'];
/*$filename = "./logs/logouts.txt";
$file = fopen( $filename, "a" );
if( $file == false ) {
    echo ( "Error in opening file" );
    exit();
}
else{
    $query = 'SELECT * FROM users WHERE user_id = '.$session_id;  
    $result = mysqli_query($con, $query);  
    $row = mysqli_fetch_array($result);  
    date_default_timezone_set("Europe/Istanbul");
    fwrite( $file, $row["username"]." logged out ". date("Y/m/d")." ".date("h:i:sa")."\n");
}
fclose( $file );*/


session_destroy();
header('location:index.php');
?>