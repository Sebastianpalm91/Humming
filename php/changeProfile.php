<?php
declare(strict_types=1);

require __DIR__.'/../php/autoload.php';

if (isset($_POST['username'])) {


  // Giving the uploaded img the username + the extension of the file
$info = pathinfo($_FILES['picture']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = $_SESSION['users']['username'].'.'.$ext;

  $userID = (int)$_SESSION['users']['userID'];
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $bio = filter_var($_POST['bio'], FILTER_SANITIZE_STRING);
  $picture = filter_var($_SESSION['users']['username'].'.'.$ext, FILTER_SANITIZE_STRING);

  $statement = $pdo->prepare('UPDATE users
                              SET email = :email, username = :username, bio = :bio, picture = :picture
                              WHERE userID = :userID');

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}
  $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
  $statement->bindParam(':username', $username, PDO::PARAM_STR);
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
  $statement->bindParam(':picture', $picture, PDO::PARAM_STR);
  $statement->execute();

  $_SESSION['msg1'] = "Your changes has been made";

  if (isset($_FILES['picture'])) {
  move_uploaded_file($_FILES['picture']['tmp_name'], __DIR__.'/../profileImages/'.$newname);
}

}
redirect('/accounts/settings.php');
