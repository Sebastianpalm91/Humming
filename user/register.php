<?php
declare(strict_types=1);

require __DIR__.'/../php/autoload.php';


if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['passwordVerify'])) {
  $_SESSION['registerError'] = [];
  $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
  $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
  $passwordVerify = trim(filter_var($_POST['passwordVerify'], FILTER_SANITIZE_STRING));

  if ($password !== $passwordVerify) {
    $_SESSION['registerError']['passwordNoMatch'] = "Oops... the password dosent match, lets try again!";
    redirect('./registerform.php');
    exit;
  }

  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  if (empty($_SESSION['registerError'])) {
    if (isset($_SESSION['registerError'])) {
      unset($_SESSION['registerError']);
    }
    $statement = $pdo->prepare('INSERT INTO users (username, email, password)
                                VALUES (:username, :email, :password)');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);
    $statement->execute();
  }

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

}
redirect('./loginform.php');
