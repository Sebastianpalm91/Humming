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
  $allPosts = "SELECT * FROM posts LEFT JOIN users ON posts.userID=users.userID";

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
  $getmyPosts = "SELECT posts.title, posts.url, posts.date, posts.description, users.username FROM posts INNER JOIN users ON posts.userID=users.userID";

  $statement = $pdo->prepare($getmyPosts);

  $statement->execute();
  $resultmyPosts = $statement->fetchAll(PDO::FETCH_ASSOC);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
return $resultmyPosts;

}
// make function for getting the profile info
function myProfile($pdo) {
  $id = $_SESSION['users']['userID'];
  $getMyProfile = "SELECT * FROM users WHERE userID= :userID";

  $statement = $pdo->prepare($getMyProfile);


  $statement->bindParam(':userID', $id, PDO::PARAM_INT);

  $statement->execute();

  $resultGetMyProfile = $statement->fetchALL(PDO::FETCH_ASSOC);
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
  return $resultGetMyProfile;

}
