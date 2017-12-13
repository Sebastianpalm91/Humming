<?php
declare(strict_types=1);

require __DIR__.'/autoload.php';
if (isset($_POST['title'], $_POST['description']) ) {

  $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
  // $url = filter_var($_POST['url'], FILTER_SANITIZE_STRING);
  $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
  $statement = $pdo->prepare('INSERT INTO posts (title, description, url, userID) VALUES (:title, :description, :url, :userID)');

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}
  $postID = $_SESSION['users']['userID'];

  $statement->bindParam(':userID', $postID, PDO::PARAM_INT);
  $statement->bindParam(':title', $title, PDO::PARAM_STR);
  $statement->bindParam(':description', $description, PDO::PARAM_STR);
  // $statement->bindParam(':url', $url, PDO::PARAM_STR);


  $statement->execute();


}
redirect('../index.php');
