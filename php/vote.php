<?php
declare(strict_types=1);
require __DIR__.'/../php/autoload.php';

// TODO: Make function so that the user only can vote ones
// if (isset($_POST)) {
//
//   $userID = $_SESSION['users']['userID'];
// $voteCheck = "SELECT COUNT(*) FROM votes WHERE userID= '$userID' AND postID= :postID";
//
// $statement = $pdo->prepare($voteCheck);
// $count = $pdo->query($voteCheck);
//
// $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
// $statement->bindParam(':postID', $postID, PDO::PARAM_INT);
//
// $statement->execute();
// $resultvoteCheck = $statement->fetchAll(PDO::FETCH_NUM);
// if (!$statement) {
//   die(var_dump($pdo->errorInfo()));
// }
//
// if ($count > 0) {
//   echo json_encode("nothing")
// } else {
//   var_dump("not");
// }
//
//
// return $resultvoteCheck;
// }


// UPVOTE
if (isset($_POST['upvote'])) {
$postID = (int)$_POST['upvote'];
$voteDir = (int)$_POST['dir'];
$userID = $_SESSION['users']['userID'];

$voteCheck = "SELECT userID, voteDir FROM votes WHERE userID= :userID AND postID= :postID";

$statement = $pdo->prepare($voteCheck);
$statement->bindParam(':userID', $userID, PDO::PARAM_INT);
// $statement->bindParam(':voteDir', $voteDir, PDO::PARAM_INT);
$statement->bindParam(':postID', $postID, PDO::PARAM_INT);

if (!$statement) {
  die(var_dump($pdo->errorInfo()));
}

$statement->execute();

$resultvoteCheck = $statement->fetch(PDO::FETCH_ASSOC);

if ($resultvoteCheck) {
  if ($resultvoteCheck['voteDir'] == $voteDir) {
    echo json_encode("nothing");
  } else {
    $voteCounter = "UPDATE votes SET voteDir= :voteDir
                    WHERE userID= :userID AND postID= :postID";

    $statement = $pdo->prepare($voteCounter);
    $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
    $statement->bindParam(':voteDir', $voteDir, PDO::PARAM_INT);
    $statement->bindParam(':postID', $postID, PDO::PARAM_INT);

    $statement->execute();
  }
} else {
  $voteCounter = "INSERT INTO votes (postID, userID, voteDir)
                  VALUES (:postID, :userID, :voteDir)";

  $statement = $pdo->prepare($voteCounter);
  $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
  $statement->bindParam(':voteDir', $voteDir, PDO::PARAM_INT);
  $statement->bindParam(':postID', $postID, PDO::PARAM_INT);

  $statement->execute();
}
}



// DOWNVOTE
if (isset($_POST['downvote'])) {
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
