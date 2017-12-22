<?php
declare(strict_types=1);
require __DIR__.'/../php/autoload.php';

if (isset($_POST['downvote'])) {

// Always start by loading the default application setup.
$postID = (int)$_POST['downvote'];
$voteDir = (int)$_POST['dir'];
$userID = $_SESSION['users']['userID'];
$voteCounter = "INSERT INTO votes (voteScore, postID, userID, voteDir)
                            VALUES (:voteScore, :postID, :userID, :voteDir)";


$statement = $pdo->prepare($voteCounter);
$statement->bindParam(':voteScore', $voteScore, PDO::PARAM_INT);
$statement->bindParam(':voteDir', $voteDir, PDO::PARAM_INT);
$statement->bindParam(':postID', $postID, PDO::PARAM_INT);

if (!$statement) {
  die(var_dump($pdo->errorInfo()));
}
$statement->execute();

$resultvoteCounter = $statement->fetchALL(PDO::FETCH_ASSOC);

echo json_encode($resultvoteCounter);
}

if (isset($_POST['upvote'])) {

// Always start by loading the default application setup.
$postID = (int)$_POST['upvote'];
$voteDir = (int)$_POST['dir'];
$userID = $_SESSION['users']['userID'];
$voteCounter = "INSERT INTO votes (postID, userID, voteDir)
                            VALUES (:postID, :userID, :voteDir)";


$statement = $pdo->prepare($voteCounter);
$statement->bindParam(':userID', $userID, PDO::PARAM_INT);
$statement->bindParam(':voteDir', $voteDir, PDO::PARAM_INT);
$statement->bindParam(':postID', $postID, PDO::PARAM_INT);

if (!$statement) {
  die(var_dump($pdo->errorInfo()));
}
$statement->execute();

$resultvoteCounter = $statement->fetchALL(PDO::FETCH_ASSOC);

echo json_encode($resultvoteCounter);
}
