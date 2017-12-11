<?php
declare(strict_types=1);

require __DIR__.'/autoload.php';
if (isset($_POST['title'], $_POST['description']) ) {

  $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
  $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
  $statement = $pdo->prepare('INSERT INTO posts (title, description) VALUES (:title, :description)');

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}

  $statement->bindParam(':title', $title, PDO::PARAM_STR);
  $statement->bindParam(':description', $description, PDO::PARAM_STR);



  $statement->execute();


  $posts = $statement->fetch(PDO::FETCH_ASSOC);

    $_SESSION['post'] = [
      'title' => $posts['title'],
      'description' => $posts['description'],
      'url' => $posts['url'],
      'postID' => $posts['postID'],
      'date' => $posts['date']
    ];

    redirect('../forum.php');
}
