<?php
declare(strict_types=1);

require __DIR__.'/autoload.php';
// Login
if (isset($_POST['email'], $_POST['password'])) {
  if (isset($_SESSION['loginErr'])) {
    unset($_SESSION['loginErr']);
  }
  $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  $password = $_POST['password'];
  $statement = $pdo->prepare('SELECT * FROM users
                              WHERE email= :email');
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->execute();
  $user = $statement->fetch(PDO::FETCH_ASSOC);
  $post = $statement->fetch(PDO::FETCH_ASSOC);
  if (!$user) {
    $_SESSION['loginErr'] = "Email or password was wrong, please try again!";
    redirect('/user/loginform.php');
    exit;
  }
  if (password_verify($password, $user["password"])) {
    $_SESSION['users'] = [
      'username' => $user['username'],
      'email' => $user['email'],
      'bio' => $user['bio'],
      'picture' => $user['picture'],
      'userID' => $user['userID']
    ];
    $_SESSION['posts'] = [
      'postID' => $post['postID'],
      'title' => $post['title'],
      'url' => $post['url'],
      'description' => $post['description'],
      'userID' => $post['userID']
    ];
    // Taking now logged in time.
    $_SESSION['start'] = time();
    // Ending a session in 30 minutes from the starting time.
    $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
    unset($user['password']);
    redirect('../index.php');
  }
  if (!password_verify($password, $user["password"])) {
    $_SESSION['loginErr'] = "Email or password was wrong, please try again!";
    redirect('/user/loginform.php');
    exit;
  }
}
