<?php
declare(strict_types=1);
require __DIR__.'/../php/autoload.php';

// TODO: Make function so that the user only can vote ones
// UPVOTE
if (isset($_POST['upvote'])) {
$postID = (int)$_POST['upvote'];
$voteDir = (int)$_POST['dir'];
$userID = $_SESSION['users']['userID'];

$voteCheckUp = "SELECT userID, voteDir FROM votes WHERE userID= :userID AND postID= :postID";

$statement = $pdo->prepare($voteCheckUp);
$statement->bindParam(':userID', $userID, PDO::PARAM_INT);
// $statement->bindParam(':voteDir', $voteDir, PDO::PARAM_INT);
$statement->bindParam(':postID', $postID, PDO::PARAM_INT);

if (!$statement) {
  die(var_dump($pdo->errorInfo()));
}

$statement->execute();

$resultvoteCheckUp = $statement->fetch(PDO::FETCH_ASSOC);

if ($resultvoteCheckUp) {
  if ($resultvoteCheckUp['voteDir'] == $voteDir) {
    echo json_encode("nothing");
  } else {
    $voteCounterUp = "UPDATE votes SET voteDir = :voteDir
                    WHERE userID= :userID AND postID= :postID";

    $statement = $pdo->prepare($voteCounterUp);
    $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
    $statement->bindParam(':voteDir', $voteDir, PDO::PARAM_INT);
    $statement->bindParam(':postID', $postID, PDO::PARAM_INT);

    $statement->execute();
  }
} else {
  $voteCounterUp = "INSERT INTO votes (postID, userID, voteDir)
                  VALUES (:postID, :userID, :voteDir)";

  $statement = $pdo->prepare($voteCounterUp);
  $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
  $statement->bindParam(':voteDir', $voteDir, PDO::PARAM_INT);
  $statement->bindParam(':postID', $postID, PDO::PARAM_INT);

  $statement->execute();
}
};



// DOWNVOTE
if (isset($_POST['downvote'])) {
$postID = (int)$_POST['downvote'];
$voteDir = (int)$_POST['dir'];
$userID = $_SESSION['users']['userID'];

$voteCheckDown = "SELECT userID, voteDir FROM votes WHERE userID= :userID AND postID= :postID";

$statement = $pdo->prepare($voteCheckDown);
$statement->bindParam(':userID', $userID, PDO::PARAM_INT);
// $statement->bindParam(':voteDir', $voteDir, PDO::PARAM_INT);
$statement->bindParam(':postID', $postID, PDO::PARAM_INT);

if (!$statement) {
  die(var_dump($pdo->errorInfo()));
}

$statement->execute();

$resultvoteCheckDown = $statement->fetch(PDO::FETCH_ASSOC);

if ($resultvoteCheckDown) {
  if ($resultvoteCheckDown['voteDir'] == $voteDir) {
    echo json_encode("nothing");
  } else {
    $voteCounterDown = "UPDATE votes SET voteDir = :voteDir
                    WHERE userID= :userID AND postID= :postID";

    $statement = $pdo->prepare($voteCounterDown);
    $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
    $statement->bindParam(':voteDir', $voteDir, PDO::PARAM_INT);
    $statement->bindParam(':postID', $postID, PDO::PARAM_INT);

    $statement->execute();
  }
} else {
  $voteCounterDown = "INSERT INTO votes (postID, userID, voteDir)
                  VALUES (:postID, :userID, :voteDir)";

  $statement = $pdo->prepare($voteCounterDown);
  $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
  $statement->bindParam(':voteDir', $voteDir, PDO::PARAM_INT);
  $statement->bindParam(':postID', $postID, PDO::PARAM_INT);

  $statement->execute();
}
}


//
//
// if (isset($_POST['downvote'])) {
// $postID = (int)$_POST['downvote'];
// $voteDir = (int)$_POST['dir'];
// $userID = $_SESSION['users']['userID'];
// $voteCounter = "INSERT INTO votes (voteScore, postID, userID, voteDir)
//                             VALUES (:voteScore, :postID, :userID, :voteDir)";
//
//
// $statement = $pdo->prepare($voteCounter);
// $statement->bindParam(':voteScore', $voteScore, PDO::PARAM_INT);
// $statement->bindParam(':voteDir', $voteDir, PDO::PARAM_INT);
// $statement->bindParam(':postID', $postID, PDO::PARAM_INT);
//
// if (!$statement) {
//   die(var_dump($pdo->errorInfo()));
// }
// $statement->execute();
//
// $resultvoteCounter = $statement->fetchALL(PDO::FETCH_ASSOC);
//
// echo json_encode($resultvoteCounter);
// }
