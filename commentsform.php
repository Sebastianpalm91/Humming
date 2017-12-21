<?php
declare(strict_types=1);
require __DIR__.'/viewings/header.php';

?>
<div class="m-4 ">

<?php $postComments = postComments($pdo, $_GET['id']) ?>
<?php foreach($postComments as $postComment): ?>
<div class="card col-sm-8 mt-2 mb-5">
      <div class="card-header pt-1 pb-1">
        <?php echo $postComment['title'];?>
      </div>
      <div class="card-body pt-1 pb-1">
      <blockquote class="blockquote mb-0">
      <p class="mb-0">
        <?php echo $postComment['description']  ?>
      </p>
      <h5><?php echo $postComment['url'] ?></h5>
      <p class="mb-0 smallfont">
        Submitted by: <?php echo $postComment['username'].' on '.$postComment['postdate'] ?>
      </p>
      <small></small>
    </blockquote>
  </div>
</div>
<?php endforeach; ?>

<?php $allComments = allComments($pdo) ?>
<?php foreach ($allComments as $comment):?>
  <div class="card col-sm-8 mt-2">
  <blockquote class="blockquote mb-0">
    <p class="mb-0"><?php echo $comment['comment']; ?></p>
    <p class="mb-0 smallfont"> Commented on: <?php echo $comment['commentDate']?>, by: <?php echo $comment['username']; ?></p>
  </blockquote>
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
