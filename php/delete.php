<?php
declare(strict_types=1);

require __DIR__.'/autoload.php';

  $delete = "DELETE FROM users WHERE ID= :ID";

  $statement = $pdo->query($delete);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
