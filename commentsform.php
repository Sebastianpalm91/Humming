<?php
declare(strict_types=1);
require __DIR__.'/viewings/header.php';

?>
<div class="m-4">

<?php $clickedPosts = clickedPosts($pdo, $_GET['id']) ?>
<?php foreach($clickedPosts as $clickedPost): ?>
<div class="card col-sm-8 mt-2 mb-5">
  <div class="card-body pl-0 pt-1 pb-1">
    <img class="float-left profilePicSubs mt-4 mr-3 " src=" <?php if(isset($clickedPost['picture'])): ?>
      <?php echo "../profileImages/".$clickedPost['picture']; ?>
    <?php else: echo "../profileImages/potato.jpg"; ?>
    <?php endif; ?>" alt="">
    <blockquote class="blockquote mb-0 ml-4 pl-4 ">
      <h2 class="border-bottom-1 mb-0 pb-2">
        <?php echo $clickedPost['title'];?>
      </h2>
      <p class="h6 font-weight-normal mb-1">
        <?php echo $clickedPost['description']  ?>
      </p>
      <h5 class="m-0"><?php echo $clickedPost['url']; ?></h5>
      <p class="mb-0 smallfont">
        Submitted by: <a href="/php/allProfiles.php?id=<?php echo $clickedPost['userID']?>"><?php echo $clickedPost['username']?></a> on <?php echo $clickedPost['postdate'] ?>
      </p>
    </blockquote>
  </div>
</div>
<?php endforeach; ?>
<?php $allComments = allComments($pdo) ?>
<?php foreach ($allComments as $comment):?>
  <div class="card col-sm-8 mt-2 mb-1">
    <div class="card-body pl-0 pt-1 pb-1">
      <img class="float-left profilePicSubs mt-1 mr-3 " src=" <?php if(isset($clickedPost['picture'])): ?>
        <?php echo "../profileImages/".$clickedPost['picture']; ?>
      <?php else: echo "../profileImages/potato.jpg"; ?>
      <?php endif; ?>" alt="">
  <blockquote class="blockquote mb-0 ml-4 pl-4 ">
    <p class="mb-0"><?php echo $comment['comment']; ?></p>
    <p class="mb-0 smallfont"> Commented on: <?php echo $comment['commentDate']?>. By: <a href="/php/allProfiles.php?id=<?php echo $comment['userID']?>"><?php echo $comment['username']; ?></a>
    </p>
    <?php $allReplys = allReplys($pdo, $comment['commentID']) ?>
    <?php foreach ($allReplys as $key => $value):?>
      <img class="float-left profilePicSubs mt-1 mr-3 " src=" <?php if(isset($value['picture'])): ?>
        <?php echo "../profileImages/".$value['picture']; ?>
      <?php else: echo "../profileImages/potato.jpg"; ?>
      <?php endif; ?>" alt="">
      <p class="mb-0"><?php echo $value['replyComment']; ?></p>
      <p class="mb-0 smallfont">
        Submitted by: <a href="/php/allProfiles.php?id=<?php echo $value['userID']?>"><?php echo $value['username']?></a> on <?php echo $value['replyDate'] ?>
      </p>
    <?php endforeach; ?>
    <form action="/php/comment/replyComments.php" method="POST">
      <input type="hidden" name="postID" value="<?php echo $comment['postID']?>">
      <input type="hidden" name="commentID" value="<?php echo $comment['commentID']?>">
      <input type="text" name="reply" required>
      <button class="btn btn-dark text-light m-0 p-0 mr-1" type="submit" name="button">Reply</button>
    </form>
  </blockquote>
</div>
</div>

<?php endforeach; ?>

<?php if (isset($_SESSION['users'])): ?>
<ul class="nav nav-pills mb-3 mt-4" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link bg-dark text-light" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">New comment</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <div class="col-md-4 col-sm-8 p-0">
        <form action="/php/newcomment.php" method="post">
          <div class="form-group">
            <label for="">Comment below</label>
            <textarea name="comment" class="form-control" rows="3" required></textarea>
          </div>
          <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
          <button type="submit" class="btn btn-dark btn-sm m-0" value="<?php echo $_GET['id'] ?>">Save</button>
        </form>
      </div>
  </div>
</div>
<?php endif; ?>


<?php // TODO: do logic to get the specific already commented comments on this post ?>
</div>
<?php require __DIR__.'/viewings/footer.php'; ?>
