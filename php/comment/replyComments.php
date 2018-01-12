<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['reply'])) {
  $postID = $_POST['postID'];
  $commentID = $_POST['commentID'];
  $newReply = filter_var($_POST['reply'], FILTER_SANITIZE_STRING);
  $userID = $_SESSION['users']['userID'];

  $statement = $pdo->prepare("INSERT INTO reply (replyComment, replyDate, commentID, postID, userID)
                              VALUES            (:replyComment, :replyDate, :commentID, :postID, :userID)");

  $commentDate = date("M d, Y: H:i");

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}

  $statement->bindParam(':userID',      $userID,      PDO::PARAM_INT);
  $statement->bindParam(':postID',      $postID,      PDO::PARAM_INT);
  $statement->bindParam(':commentID',   $commentID,   PDO::PARAM_INT);
  $statement->bindParam(':replyComment',$newReply,    PDO::PARAM_STR);
  $statement->bindParam(':replyDate',   $replyDate, PDO::PARAM_STR);

  $statement->execute();
}
redirect("../../commentsform.php?id=$postID");
