<?php 
include('session.php');  
include('dbcon.php'); 
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO tbl_images(name,user_id) VALUES ('$file','$session_id')";  
      if(mysqli_query($con, $query))  
      {  
           echo '<script>alert("Image Added Successfully")</script>';  
      }  
 }  
  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>CENG 388</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="text-align: center;">
               <nav>
                  <a href="insertNote.php" /> Insert Note
                  <a href="uploadPhoto.php"/>Upload Photo
                  <p><a href="logout.php">Log out</a></p>
               </nav>
               
           </div>
           <div class="container" style="width:500px;">  
                <h3 align="center">Insert and Display Images From Mysql Database in PHP</h3>  
                <br />  
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br />  
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
                <br />  
                <br />  
                <table class="table table-bordered">  
                     <tr>  
                          <th>Image</th>  
                     </tr>  
                <?php  
                $query = 'SELECT * FROM tbl_images WHERE user_id = '.$session_id;  
                $result = mysqli_query($con, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                    echo "<td>"; 

                    echo '<img src="data:image/jpg;base64,'.base64_encode($row['name'] ).'" height="200" width="200"/>';

                    echo "<br>";
                    ?><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a> 
                         <a href="downloadPhoto.php?id=<?php echo $row["id"]; ?>">Download</a> 
                    <?php
                    echo "</td>";
                }  
                ?>  
                </table>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  
