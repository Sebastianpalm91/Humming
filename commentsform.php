<?php
declare(strict_types=1);
require __DIR__.'/viewings/header.php';
?>

<?php $postComments = postComments($pdo) ?>
<?php foreach($postComments as $postComment): ?>
<div class="card col-sm-8 mt-2">
      <div class="card-header pt-1 pb-1">
        <?php echo $postComment['title'];?>
      </div>
      <div class="card-body pt-1 pb-1">
      <blockquote class="blockquote mb-0">
      <p class="mb-0">
        <?php echo $postComment['description'] ?>
      </p>
      <h5><?php echo $postComment['url'] ?></h5>
      <p class="mb-0 smallfont">
        Submitted by: <?php echo $postComment['username'].' on '.$postComment['postdate'] ?>
      </p>
      <small></small>
    </blockquote>
    <a href="/php/comments.php" class="badge badge-secondary"><p class="mb-0"><small>Comments</small></p></a>
  </div>
</div>
<?php endforeach; ?>


<?php if (isset($_SESSION['users'])): ?>
<div class="col-md-4 col-sm-8 m-2">
  <form action="" method="post">
    <div class="form-group">
      <label for="">Comment below</label>
      <textarea class="form-control" rows="3"></textarea>
    </div>
  </form>
  <button type="submit" class="btn btn-secondary btn-sm p-0 m-0">Save</button>
</div>
<?php endif; ?>

<?php // TODO: do logic to get the specific already commented comments on this post ?>

<?php require __DIR__.'/viewings/footer.php'; ?>
