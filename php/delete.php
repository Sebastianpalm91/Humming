<?php
declare(strict_types=1);

require __DIR__.'/autoload.php';

  $id = $_GET['ID'];

  $delete = "DELETE FROM users WHERE ID= :ID";
  $statement = $pdo->prepare($delete);

  $statement->bindParam(':ID', $id, PDO::PARAM_STR);
  $statement->execute();

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
