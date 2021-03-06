<?php
declare(strict_types=1);

require __DIR__.'/../php/autoload.php';

if (isset($_POST['updateTitle'], $_POST['updateDesc'], $_POST['updateUrl'])) {
  if (isset($_SESSION['msgEdit'])) {
    unset($_SESSION['msgEdit']);
  }
  $_SESSION['msgEdit'] = "You have edited your post";
  $postID      = $_POST['id'];
  $updateTitle = filter_var($_POST['updateTitle'], FILTER_SANITIZE_STRING);
  $updateDesc  = filter_var($_POST['updateDesc'], FILTER_SANITIZE_STRING);
  $updateUrl   = filter_var($_POST['updateUrl'], FILTER_SANITIZE_STRING);
  $postDate    = date("M d, Y: H:i");
  $updatePost  = "UPDATE posts
                  SET title = :title, url = :url, description = :description, postDate = :postDate
                  WHERE postID= :postID";
  $statement = $pdo->prepare($updatePost);
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
  $statement->bindParam(':title',       $updateTitle, PDO::PARAM_STR);
  $statement->bindParam(':description', $updateDesc,  PDO::PARAM_STR);
  $statement->bindParam(':postID',      $postID,      PDO::PARAM_INT);
  $statement->bindParam(':postDate',    $postDate,    PDO::PARAM_STR);
  $statement->bindParam(':url',         $updateUrl,   PDO::PARAM_STR);
  $statement->execute();
}
redirect("/php/editsubmit.php?id=$postID");
