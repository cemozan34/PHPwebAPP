<?php
include("dbcon.php");
include("session.php");

$id=$_GET["id"];
$sql = "select * from tbl_images where id=".$_GET["id"]; 
$res = $con->query($sql);
while($row = $res->fetch_assoc())
 { 
if($row["user_id"] == $session_id){
    $image = $row['name'];
    header("Content-type: ".gettype($image));
header('Content-Disposition: attachment; filename=\help');
header("Content-Transfer-Encoding: jpg"); 
header('Expires: 0');
header('Pragma: no-cache');
header("Content-Length: ".strlen($image));

echo $image;
exit();

}
else{
    echo '<script>alert("This photo is not yours. Go back to the site!")</script>';
    echo "<script>window.top.location='home.php'</script>";
}
 
 }

 
 

 
?>