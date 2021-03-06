<?php
declare(strict_types=1);
// Always start by loading the default application setup.
require __DIR__.'/../php/autoload.php';
$name       = $_GET['username'];
$searchUser = "SELECT username FROM users
               WHERE username= :username";
$statement  = $pdo->prepare($searchUser);
$statement->bindParam(':username', $name, PDO::PARAM_STR);
if (!$statement) {
  die(var_dump($pdo->errorInfo()));
}
$statement->execute();
$resultsearchUser = $statement->fetchALL(PDO::FETCH_ASSOC);
echo json_encode($resultsearchUser);
