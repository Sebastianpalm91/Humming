<?php
declare(strict_types=1);

require __DIR__.'/../php/autoload.php';

if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $statement = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}

  $statement->bindParam(':username', $username, PDO::PARAM_STR);
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->bindParam(':password', $password, PDO::PARAM_STR);

  $statement->execute();
}
redirect('/../loginform.php');
