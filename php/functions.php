<?php
declare(strict_types=1);
if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect($path)
    {
        header("Location: ${path}");
        exit;
    }
}
// make function for getting all the posts
function posts($pdo) {
  $allPosts = "SELECT *
               FROM posts
               LEFT JOIN users
               ON posts.userID=users.userID
               ORDER BY postID DESC";
  $statement = $pdo->prepare($allPosts);
  $statement->execute();
  $resultPosts = $statement->fetchAll(PDO::FETCH_ASSOC);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
  return $resultPosts;
}
//Up/downvote counter
function voteCounter($pdo) {
  $postID = $_GET['id'];
  $voteCounter = "SELECT voteID, postID, userID FROM votes
                  INNER JOIN users
                  ON votes.userID=users.userID
                  WHERE postID = :postID";
  $statement = $pdo->prepare($voteCounter);
  $statement->bindParam(':postID', $postID, PDO::PARAM_INT);
  $statement->execute();
  $resultvoteCounter = $statement->fetchAll(PDO::FETCH_ASSOC);
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
  return $resultmyPosts;
}
// make function for joining the table posts with username in users
function myPosts($pdo) {
  $id = (int)$_SESSION['users']['userID'];
  $getmyPosts = "SELECT posts.title, posts.url, posts.postdate, posts.description, posts.postID, users.username, users.userID
                 FROM posts
                 LEFT JOIN users
                 ON posts.userID=users.userID
                 WHERE posts.userID= :userID
                 ORDER BY posts.postID DESC;";
  $statement = $pdo->prepare($getmyPosts);
  $statement->bindParam(':userID', $id, PDO::PARAM_INT);
  $statement->execute();
  $resultmyPosts = $statement->fetchAll(PDO::FETCH_ASSOC);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
return $resultmyPosts;
}
// make function for getting the profile info
function myProfile($pdo) {
  $id = (int)$_SESSION['users']['userID'];
  $getMyProfile = "SELECT * FROM users
                   WHERE userID= :userID";
  $statement = $pdo->prepare($getMyProfile);
  $statement->bindParam(':userID', $id, PDO::PARAM_INT);
  $statement->execute();
  $resultGetMyProfile = $statement->fetchALL(PDO::FETCH_ASSOC);
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
  return $resultGetMyProfile;

}

// Get specific post when inside to comment

function clickedPosts($pdo, $postID) {
  $postID = $_GET['id'];
  $clickedPosts = "SELECT posts.title, posts.url, posts.postdate, posts.description, posts.postID, users.username, users.userID
                   FROM posts
                   LEFT JOIN users
                   ON posts.userID=users.userID
                   WHERE postID = '$postID'" ;
  $statement = $pdo->prepare($clickedPosts);
  $statement->execute();
  $resultclickedPosts = $statement->fetchAll(PDO::FETCH_ASSOC);
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
  return $resultclickedPosts;
 }

 // Get all comments from specific post
 function allComments($pdo) {
   $postID = $_GET['id'];
   $allComments = "SELECT commentID, comment, commentDate, username, users.userID
                   FROM comments
                   INNER JOIN users
                   ON comments.userID=users.userID
                   WHERE postID = :postID";
   $statement = $pdo->prepare($allComments);
   $statement->bindParam(':postID', $postID, PDO::PARAM_INT);
   $statement->execute();

   $resultallComments = $statement->fetchAll(PDO::FETCH_ASSOC);

   if (!$statement) {
     die(var_dump($pdo->errorInfo()));
   }
   return $resultallComments;
 }
// SELECT username, comments, commentDate FROM comments INNER JOIN users ON posts.userID=comments.userID WHERE postID = '$postID'"

function editPosts($pdo) {
  $postID = $_GET['id'];
  $editPosts = "SELECT posts.title, posts.url, posts.postdate, posts.description, posts.postID, users.username
                FROM posts
                LEFT JOIN users
                ON posts.userID=users.userID
                WHERE postID = '$postID'";
  $statement = $pdo->prepare($editPosts);
  $statement->execute();
  $resulteditPosts = $statement->fetchAll(PDO::FETCH_ASSOC);
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
  return $resulteditPosts;
}

// Get user profile from the $submits
function userProfile($pdo) {
  $userID = $_GET['id'];
  $statement = $pdo->prepare("SELECT userID, username, email, bio, picture FROM users WHERE userID = :userID");
  $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
  $statement->execute();
  $userProfile = $statement->fetchAll(PDO::FETCH_ASSOC);
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
  return $userProfile;

}

function voteSum($pdo, $postID) {
  $voteSum =  "SELECT sum(voteDir)
               AS score
               FROM votes
               WHERE postID= :postID";

$statement = $pdo->prepare($voteSum);
$statement->bindParam(':postID', $postID, PDO::PARAM_INT);

$statement->execute();
$resultvoteSum = $statement->fetch(PDO::FETCH_ASSOC);

if (!$statement) {
  die(var_dump($pdo->errorInfo()));
}
return $resultvoteSum;
}
