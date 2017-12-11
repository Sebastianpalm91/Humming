<?php
declare(strict_types=1);

require __DIR__.'/autoload.php';

  $id = $_GET['userID'];

  $delete = "DELETE FROM users WHERE userID= :userID";
  $statement = $pdo->prepare($delete);

  $statement->bindParam(':userID', $id, PDO::PARAM_STR);
  $statement->execute();

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
  session_destroy();
  redirect('/index.php');
