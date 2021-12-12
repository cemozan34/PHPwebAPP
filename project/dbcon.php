<?php
/*$con = mysqli_connect("localhost","root","","login");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }*/

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("mysql://bf07d9c8fe9aeb:db95de1d@eu-cdbr-west-01.cleardb.com/heroku_97830f710fdaba0?reconnect=true"));
$cleardb_server = 'eu-cdbr-west-01.cleardb.com';
$cleardb_username = 'bf07d9c8fe9aeb';
$cleardb_password = 'db95de1d';
$cleardb_db = 'heroku_97830f710fdaba0';
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$con = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>
