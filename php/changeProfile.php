<?php
declare(strict_types=1);

require __DIR__.'/../php/autoload.php';

if (isset($_POST['username'], $_POST['email'], $_POST['bio'])) {
  $userID = (int)$_SESSION['users']['userID'];
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $bio = filter_var($_POST['bio'], FILTER_SANITIZE_STRING);

  $statement = $pdo->prepare('UPDATE users SET email = :email, username = :username, bio = :bio WHERE userID = :userID');

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}
  $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
  $statement->bindParam(':username', $username, PDO::PARAM_STR);
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
  $_SESSION['msg1'] = "Your changes has been made";
  $statement->execute();
}
redirect('/accounts/settings.php');
