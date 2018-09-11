<?php
    include "db.php";
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

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->

    <link href="styles/blog.css" rel="stylesheet">
</head>

<body>

<?php
    include "header.php";//ubacili smo header
?>

<div class="single-comment">
    <ul>
        <li>
            <div>posted by:<strong><?php echo($comment['author']);?>
            </strong> on <?php echo($comment['created_at']);?></div>
            </div>
        </li>
    </ul>
</div>

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
            <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div>

        <?php

        ?>

    </div>
</main>

<?php 
    include "footer.php";
?>

</body>
</html>

