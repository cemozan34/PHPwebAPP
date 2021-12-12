<?php 
include('session.php');  
include('dbcon.php');
 if(isset($_POST["insert"]))  
 {  
     $title = $_POST['title'];
     $text = $_POST['text'];
     $modified_text = str_replace("'","\'",$text);
     $modified_text = str_replace('"','\"',$modified_text);
      $query = "INSERT INTO tbl_texts(title,text,user_id) VALUES ('$title','$modified_text','$session_id')";  
      if(mysqli_query($con, $query))  
      {  
           echo '<script>alert("Text Added Successfully")</script>';  
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
                <h3 align="center">Insert and Display Notes </h3>  
                <br />  
                <form method="post" >  
                    <label>Title: </label><br/><input type="text" name = "title" placeholder="title" placeholder="topic" id="title">
                     <br />
                     <label> Text: </label><br/>
                     <textarea type="text" name="text" id="text" placeholder="Write anything you want"> </textarea>  
                     <br />  
                     
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
                <br />  
                <br />  
                <table class="table table-bordered">  
                     <tr>  
                          <th>text</th>  
                     </tr>  
                <?php  
                $query = 'SELECT * FROM tbl_texts WHERE user_id = '.$session_id;  
                $result = mysqli_query($con, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                    echo "<td>"; 
                    echo '<p> <b>'.$row["title"].'</b></p>';
                    echo '<p> '.$row["text"].'</p>';

                    echo "<br>";
                    ?><a href="deleteNote.php?id=<?php echo $row["id"]; ?>">Delete</a> 
                         <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a> 
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
           var text_name = $('#text').val();  
           var title_name = $('#title').val();
           if(text_name == '')  
           {  
                alert("Please Select Text");  
                return false;  
           } else if(title_name == '')  
           {  
                alert("Please Enter Title");  
                return false;  
           }   
      });  
 });  
 </script>  
