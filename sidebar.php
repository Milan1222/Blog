<?php include 'db.php'; ?>
<?php
$sql = "SELECT id, title, created_at FROM posts ORDER BY created_at DESC LIMIT 5";

$statement = $connection->prepare($sql);

$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);

$postTitle = $statement->fetchAll();




?>
<aside class="col-sm-3 ml-sm-auto blog-sidebar">

<div class="sidebar-module sidebar-module-inset">
    <h4>Latest posts</h4>
    <?php foreach($postTitle as $title) { ?>
        <p><a href="single-post.php?id=<?php echo($title['id']); ?>"><?php echo($title['title']); ?></a></p>
    <?php } ?>
</div>

</aside>