<?php
declare(strict_types=1);

require __DIR__.'/../php/autoload.php';

if (isset($_POST['comment'])) {
  $postID 	  = $_POST['id'];
  $newComment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
  $userID 	  = $_SESSION['users']['userID'];

  $statement = $pdo->prepare("INSERT INTO comments (comment, commentDate, postID, userID)
                              VALUES               (:comment, :commentDate, :postID, :userID)");

  $commentDate = date("M d, Y: H:i");

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}

  $statement->bindParam(':userID',      $userID,      PDO::PARAM_INT);
  $statement->bindParam(':postID',      $postID,      PDO::PARAM_INT);
  $statement->bindParam(':comment',     $newComment,  PDO::PARAM_STR);
  $statement->bindParam(':commentDate', $commentDate, PDO::PARAM_STR);

  $statement->execute();
}
redirect("/php/comment/commentsform.php?id=$postID");
