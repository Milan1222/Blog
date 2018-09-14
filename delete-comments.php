<?php include 'db.php'; 

$post_id=($_POST['post_id']);
$comment_id= $_POST['comment_id']; 

$sql= "DELETE FROM comments WHERE id={$comment_id}"; 
$statement = $connection->prepare($sql);
$statement->execute();

header("Location: single-post.php?id=" .$post_id);