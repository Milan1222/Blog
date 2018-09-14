<?php
  include "db.php";

  $postId = $_POST['post_id'];
  $formName = $_POST['formName'];
  $comment = $_POST['comment'];

  $sql="INSERT INTO comments (author, text, post_id) VALUES ('$formName', '$comment', '$postId')";
  $statement = $connection->prepare($sql);

  $statement->execute();

  header("Location: single-post.php?id=" . $postId);

?>