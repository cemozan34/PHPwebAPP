<?php
include("dbcon.php");
$sql = "DELETE FROM tbl_texts WHERE id=".$_GET["id"];
if(mysqli_query($con,$sql)){
  echo ("Record deleted successfully");
}
else{
  echo ("Cannot delete record!");
}
?>

<script type="text/javascript">
window.location ="insertNote.php";
</script>

