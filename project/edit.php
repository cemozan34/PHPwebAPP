<?php
include("dbcon.php");
include('session.php'); 
$sql = "SELECT * FROM tbl_texts WHERE id=".$_GET["id"];
$result = mysqli_query($con, $sql); 
$row = mysqli_fetch_array($result); 

if($row["user_id"] != $session_id){
    echo '<script>alert("This note is not yours. Go back to site")</script>';
    echo "<script>window.top.location='home.php'</script>";
}
else{
    if(isset($_POST["insert"]))  
 {  
     $title = $_POST['newTitle'];
     $text = $_POST['newText'];
      $query = "UPDATE tbl_texts SET title = "."'"."$title"."'"." ,text= "."'".$text."'"." WHERE id =".$_GET["id"]; 
      if(mysqli_query($con, $query))  
      {  
           echo '<script>alert("Text Edited Successfully")</script>';  
           echo "<script>window.top.location='insertNote.php'</script>";
      }  
 }  
}
 //title, text, user_id
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note</title>
</head>
<body>
    <nav>
        <a href="home.php" /> Home
        <a href="insertNote.php" /> Insert Note
        <a href="uploadPhoto.php"/>Upload Photo
        <p><a href="logout.php">Log out</a></p>
    </nav>
    <form method="post" >  
        <label>Title: </label><br/><input type="text" name = "newTitle" placeholder="New Title" placeholder="topic" id="title">
        <br />
        <label> Text: </label><br/>
        <textarea type="text" name="newText" id="text" placeholder="Edit the note"> <?php echo $row["text"]; ?> </textarea>  
        <br />  
        
        <input type="submit" name="insert" id="insert" value="Edit" class="btn btn-info" />  
    </form>  
</body>
</html>


