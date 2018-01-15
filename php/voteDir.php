<?php
declare(strict_types=1);
require __DIR__.'/../php/autoload.php';
$postID = $_POST['postID'];
$userID = $_SESSION['users']['userID'];
$voteSum =  "SELECT voteDir, sum(voteDir)
             AS score
             FROM votes
             WHERE postID= :postID
             AND userID= :userID";
$statement = $pdo->prepare($voteSum);
$statement->bindParam(':postID', $postID, PDO::PARAM_INT);
$statement->bindParam(':userID', $userID, PDO::PARAM_INT);
$statement->execute();
$voteDir = $statement->fetch(PDO::FETCH_ASSOC);
if (!$statement) {
die(var_dump($pdo->errorInfo()));
}
echo json_encode($voteDir);
