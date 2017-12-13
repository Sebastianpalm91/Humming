<?php
declare(strict_types=1);

require __DIR__.'/../php/autoload.php';

if (isset($_POST['password'])) {
  $password = trim(password_hash($_POST['password'], PASSWORD_DEFAULT));
  $changePass = "UPDATE users
                 SET password= :password
                 WHERE userID= :userID";
  $statement = $pdo->prepare($changePass);


  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}
$statement->bindParam(':userID', $_SESSION['users']['userID'], PDO::PARAM_STR);
$statement->bindParam(':password', $password, PDO::PARAM_STR);

$statement->execute();
$_SESSION['msg'] = "Password has been changed (Please refresh the page)";

redirect('/accounts/settings.php');
}
