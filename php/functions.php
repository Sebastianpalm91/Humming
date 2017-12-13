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
  $allPosts = "SELECT * FROM posts
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
// make function for joining the table posts with username in users
function myPosts($pdo) {
// SELECT posts.title, posts.url, posts.postdate, posts.description, users.username FROM posts LEFT JOIN users ON posts.postID=users.userID WHERE userID= :userID
  $id = (int)$_SESSION['users']['userID'];
  $getmyPosts = "SELECT posts.title, posts.url, posts.postdate, posts.description, users.username
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

// Get posts when inside to comment

function postComments($pdo) {
  $postComments = "SELECT * FROM posts
               LEFT JOIN users
               ON posts.userID=users.userID";

  $statement = $pdo->prepare($postComments);


  $statement->execute();

  $resultpostComment = $statement->fetchAll(PDO::FETCH_ASSOC);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
  return $resultpostComment;


 }


 // searching in db if username already exists
