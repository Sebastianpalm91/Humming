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
function posts($pdo) {
  $allPosts = "SELECT * FROM posts";

  $statement = $pdo->prepare($allPosts);

  $statement->execute();
  $resultPosts = $statement->fetchAll(PDO::FETCH_ASSOC);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
  return $resultPosts;
}

function myPosts($pdo) {
  $myposts = "SELECT * FROM users WHERE userID= :userID";
  $getmyPosts = "SELECT posts.postID, posts.title, posts.url, posts.date, posts.description, users.username FROM posts INNER JOIN users ON posts.postID=users.userID  ";

  // $myPosts = "SELECT = {$getmyPosts} posts.postID, posts.title, posts.description, users.username FROM posts INNER JOIN users ON posts.postID=users.userID";
  $statement = $pdo->prepare($getmyPosts);

  $statement->execute();
  $resultmyPosts = $statement->fetchAll(PDO::PARAM_STR);
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
return $resultmyPosts;

}
