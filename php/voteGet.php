<?php
declare(strict_types=1);
require __DIR__.'/../php/autoload.php';
$postID  = $_POST['postID'];
$voteSum =  "SELECT voteDir, sum(voteDir)
             AS score
             FROM votes
             WHERE postID= :postID";
$statement = $pdo->prepare($voteSum);
$statement->bindParam(':postID', $postID, PDO::PARAM_INT);
$statement->execute();
$score = $statement->fetch(PDO::FETCH_ASSOC);
if (!$statement) {
die(var_dump($pdo->errorInfo()));
}
echo json_encode($score);
