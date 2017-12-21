<?php
declare(strict_types=1);

require __DIR__.'/../php/autoload.php';

if (isset($_POST['username'], $_POST['email'], $_POST['bio'])) {
  $userID = (int)$_SESSION['users']['userID'];
  $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
  $bio = trim(filter_var($_POST['bio'], FILTER_SANITIZE_STRING));
  $statement = $pdo->prepare('UPDATE users
                              SET email = :email, username = :username, bio = :bio
                              WHERE userID = :userID');

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}
  $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
  $statement->bindParam(':username', $username, PDO::PARAM_STR);
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
  $statement->execute();

  $_SESSION['msg1'] = "Your changes has been made";



}
if (isset($_POST['picture'])) {
  // Giving the uploaded img the username + the extension of the file
  $info = pathinfo($_FILES['picture']['name']);
  $ext = $info['extension'];  //get the extension of the file
  $newname = $_SESSION['users']['username'].'.'.$ext;

  $userID = (int)$_SESSION['users']['userID'];
  $picture = trim(filter_var($_SESSION['users']['username'].'.'.$ext, FILTER_SANITIZE_STRING));
  $statement = $pdo->prepare('UPDATE users
                              SET picture = :picture
                              WHERE userID = :userID');
    if (!$statement) {
      die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':picture', $picture, PDO::PARAM_STR);
    $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
    $statement->execute();

    if (isset($_FILES['picture'])) {
      move_uploaded_file($_FILES['picture']['tmp_name'], __DIR__.'/../profileImages/'.$newname);
    }

    $_SESSION['msg1'] = "Your changes has been made";
    redirect('/accounts/settings.php');
  }
redirect('/accounts/settings.php');



// if (isset($_POST['username'])) {
//   $userID = (int)$_SESSION['users']['userID'];
//   $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_EMAIL));
//   $statement = $pdo->prepare('UPDATE users
//                               SET username = :username
//                               WHERE userID = :userID');
//     if (!$statement) {
//       die(var_dump($pdo->errorInfo()));
//     }
//     $statement->bindParam(':username', $username, PDO::PARAM_STR);
//     $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
//     $statement->execute();
//     $_SESSION['msg1'] = "Your changes has been made";
//     redirect('/accounts/settings.php');
//   }
//
// if (isset($_POST['email'])) {
//   $userID = (int)$_SESSION['users']['userID'];
//   $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
//   $statement = $pdo->prepare('UPDATE users
//                               SET email = :email
//                               WHERE userID = :userID');
//     if (!$statement) {
//       die(var_dump($pdo->errorInfo()));
//     }
//     $statement->bindParam(':email', $email, PDO::PARAM_STR);
//     $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
//     $statement->execute();
//     $_SESSION['msg1'] = "Your changes has been made";
//     redirect('/accounts/settings.php');
//   }
//
// if (isset($_POST['bio'])) {
//   $userID = (int)$_SESSION['users']['userID'];
//   $bio = trim(filter_var($_POST['bio'], FILTER_SANITIZE_STRING));
//   $statement = $pdo->prepare('UPDATE users
//                               SET bio = :bio
//                               WHERE userID = :userID');
//     if (!$statement) {
//       die(var_dump($pdo->errorInfo()));
//     }
//     $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
//     $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
//     $statement->execute();
//     $_SESSION['msg1'] = "Your changes has been made";
//     redirect('/accounts/settings.php');
//   }
//
// if (isset($_POST['picture'])) {
//   $userID = (int)$_SESSION['users']['userID'];
//   Giving the uploaded img the username + the extension of the file
//   $info = pathinfo($_FILES['picture']['name']);
//   $ext = $info['extension'];  get the extension of the file
//   $newname = $_SESSION['users']['username'].'.'.$ext;
//   $picture = trim(filter_var($_SESSION['users']['username'].'.'.$ext, FILTER_SANITIZE_STRING));
//   $statement = $pdo->prepare('UPDATE users
//                               SET picture = :picture
//                               WHERE userID = :userID');
//     if (!$statement) {
//       die(var_dump($pdo->errorInfo()));
//     }
//     $statement->bindParam(':picture', $picture, PDO::PARAM_STR);
//     $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
//     $statement->execute();
//
//     if (isset($_FILES['picture'])) {
//       move_uploaded_file($_FILES['picture']['tmp_name'], __DIR__.'/../profileImages/'.$newname);
//     }
//
//     $_SESSION['msg1'] = "Your changes has been made";
//     redirect('/accounts/settings.php');
//   }
//   redirect('/accounts/settings.php');
