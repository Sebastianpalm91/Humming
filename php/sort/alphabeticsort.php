<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';
if (isset($_POST['alpha'])) {
  $alphabetic =  "SELECT * FROM posts
                  LEFT JOIN users
                  ON posts.userID=users.userID
                  ORDER BY title DESC";
  $statement = $pdo->prepare($alphabetic);
  $statement->execute();
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
  redirect('../../index.php');
}
