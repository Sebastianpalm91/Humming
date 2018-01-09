<?php
declare(strict_types=1);
require __DIR__.'/autoload.php';

if (isset($_GET['id'])) {
  $postID = $_GET['id'];
  $deletePost = "DELETE FROM posts
                 WHERE postID= :postID";
  $statement = $pdo->prepare($deletePost);
  $statement->bindParam(':postID', $postID, PDO::PARAM_INT);
  $statement->execute();
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
}


  redirect('/index.php');
