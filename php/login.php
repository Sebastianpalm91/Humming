<?php
declare(strict_types=1);

require __DIR__.'/autoload.php';

if (isset($_POST['email'], $_POST['password'])) {
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = $_POST['password'];
  $statement = $pdo->prepare('SELECT * FROM users WHERE email= :email');

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  // $statement->bindParam(':password', $password, PDO::PARAM_STR);


  $statement->execute();
  $user = $statement->fetch(PDO::FETCH_ASSOC);
  if (!$user) {
    redirect('/../loginform.php');
    echo "WRONG";
  }
  if (password_verify($password, $user["password"])) {
    $_SESSION['users'] = [
      'username' => $user['username'],
      'email' => $user['email'],
      'ID' => $user['ID']
    ];

    redirect('../index.php');
  }
  if (!password_verify($password, $user["password"])) {
    redirect('/../loginform.php');
  }
}
