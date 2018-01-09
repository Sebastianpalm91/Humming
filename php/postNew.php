<?php
declare(strict_types=1);

require __DIR__.'/autoload.php';
if (isset($_POST['title'], $_POST['description']) ) {
  // $url = filter_var($_POST['url'], FILTER_SANITIZE_STRING);
  $title       = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
  $description = trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));
  $statement   = $pdo->prepare('INSERT INTO posts (title, description, url, userID, postdate, postID)
                                VALUES            (:title, :description, :url, :userID, :postdate, :postID)');
  $postdate = date("M d, Y: H:i");
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
  $postID = $_SESSION['posts']['postID'];
  $userID = $_SESSION['users']['userID'];
  $statement->bindParam(':userID',      $userID,      PDO::PARAM_INT);
  $statement->bindParam(':postID',      $postID,      PDO::PARAM_INT);
  $statement->bindParam(':title',       $title,       PDO::PARAM_STR);
  $statement->bindParam(':description', $description, PDO::PARAM_STR);
  $statement->bindParam(':postdate',    $postdate,    PDO::PARAM_STR);
  // $statement->bindParam(':url', $url, PDO::PARAM_STR);
  $statement->execute();
}
redirect('../index.php');
