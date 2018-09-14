<?php
    include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="icon" href="../../../../favicon.ico">
    <title>Vivify Blog</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 
    <link href="styles/blog.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>

<?php
    include "header.php";
?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php
                $post_id=($_GET['id']);                     

                $sql = 'SELECT * FROM posts WHERE id = ' . $post_id;

                $statement = $connection->prepare($sql);               

                $statement->execute();  

                $statement->setFetchMode(PDO::FETCH_ASSOC);

                $singlePost = $statement->fetch();
            ?>

            <h2 class="blog-post-title"><?php echo($singlePost['title']); ?></h2>
            <p class="blog-post-meta"><?php echo($singlePost['created_at']); ?> by <a href="#"><?php echo($singlePost['author']); ?></a></p>
            <p> <?php echo($singlePost['body']); ?> </p>
            <hr>
            <button class="btn btn-default" onsubmit="return prompt()" type="Submit">Delete this post</button>
            
            <script>
                function prompt() {
                    var areSure = prompt('Do you really want to delete this post?(Yes/No)');
                    if(areSure === 'Yes' || areSure == 'yes') {
                        return true;
                    }else {
                        return false;
                    }
                }
            </script>
            
            <form name="firstFrom" action="create-comment.php" onsubmit="return commentForm()" method="post">            
            
            <input name="author" type="text" class="" placeholder="Username"><br>
                       
                       
            <textarea name="comment" class="" rows="5" cols="50" placeholder="Enter comment here..."></textarea>
            <input type="number" hidden name="post_id" value=<?php echo($post_id); ?> > <br>
            <button type="submit" name="Submit" class="btn btn-default" onsubmit="commentForm() ">Submit</button>
            </form>
            <script>
            function commentForm() {
            var author = document.forms['firstFrom']['author'].value;                                                                                                                                
            var comment = document.forms['firstFrom']['comment'].value;
                                                                                                                             
             if (author == '' || comment == '') { 
                alert('Put text in all fields!');
                return false;
                }

            return true;

            }
            </script> 

            <br>
            <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
        </div>
    </div>
    
    
    <button onclick="myFunction()" id="myButton">Hide comments</button>
        <div id="comments">    
            <?php
                include 'comments.php';
            ?>  
        </div>

<script src="javafile.js"></script>

<script>
     function myFunction() {
    var $comments = document.getElementById("comments");

    var $mybutton = document.getElementById("myButton");

    if ($comments.style.display === "none") {
        $mybutton.innerHTML = 'Hide comments';
        $comments.style.display = "block";
    } else {
        $comments.style.display = "none";
        $mybutton.innerHTML = 'Show comments';
    }
}
</script>

</main>

<?php 
    include "footer.php";
?>

</body>
</html>

