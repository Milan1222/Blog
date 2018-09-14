<?php

  include "db.php";
  include 'header.php';
 
    if(isset($_POST['button'])) {

    
  $postName = $_POST['title'];
  $post = $_POST['body'];
  $name = $_POST['author'];

  $sql="INSERT INTO posts (title, body, author) VALUES ('$postName', '$post', '$name')";
  $statement = $connection->prepare($sql);

  $statement->execute();
  header("Location: index.php");
   
    }
    
    //  include_once 'sidebar.php';
?>
<div class="container">
<form action="create-post.php" method="post" name="mypost" onsubmit="return fieldsRequried()">
<input type="text" name="author" placeholder="author name">
<br>
<input type="text" name="title" placeholder="subject"> 
<br>
<textarea name="body" cols="30" rows="10" placeholder="Enter text here..."></textarea> 
<br>
<button type="submit" name="button" class="btn btn-default">Submit</button>
</form>
</div>
<?php
    
?>

<script>



function fieldsRequried(){
    var name = document.forms['mypost']['author'].value;
    var postName = document.forms['mypost']['title'].value; 
    var post = document.forms['mypost']['body'].value;



    if (name == '' || postName == '' || post == ''){ 

        alert('All fields are required!'); 

        return false;

    } else {

        return true; 
    }
}



</script>
<?php include 'footer.php'; ?>

