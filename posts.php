<?php
include "db.php";
?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
<?php

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$statement = $connection->prepare($sql);

$statement->execute();//izvrsavamo upit
$statement->setFetchMode(PDO::FETCH_ASSOC);

$posts = $statement->fetchAll();

?>



<div class="blog-post">
    <?php foreach($posts as $post) { ?>


<h2 class="blog-post-title"><a href="single-post.php?id=<?php echo($post['id']) ?>"><?php echo($post['title']); ?></a></h2>
<p class="blog-post-meta"><?php echo($post['created_at']); ?> by <a><?php echo($post['author']); ?></a></p>
<p><?php echo($post['body']); ?></p>

    <?php } ?>

</div>