<?php 
    $error = $_SERVER["REDIRECT_STATUS"];
    $error_title = "";
    $error_message = "";
    if($error == 404){
        $error_title = "404 Page Not Found";
        $error_message= "The document/file request does not found in the server";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
</head>
<body>
    <h1><?php echo $error_title; ?></h1>
    <h1><?php echo $error_message; ?></h1>
</body>
</html>