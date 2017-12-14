<?php require __DIR__.'/viewings/header.php'; ?>

<?php $editPosts = editPosts($pdo) ?>
<?php foreach($editPosts as $editPost):?>
  <div class="card col-sm-8 mt-2">
        <div class="card-header pt-1 pb-1">
          <?php echo $editPost['title'];?>
        </div>
        <div class="card-body pt-1 pb-1">
        <blockquote class="blockquote mb-0">
        <p class="mb-0">
          <?php echo $editPost['description']; ?>
        </p>
        <h5><?php echo $editPost['url']; ?></h5>
        <p class="mb-0 smallfont">
          Submitted by: <?php echo $editPost['username'].' on '.$editPost['postdate']; ?>
        </p>
        <small></small>
      </blockquote>
      <?php if (isset($_SESSION['users']['userID'])):?>
          <a href="/editsubmit.php" class="badge badge-secondary"><p class="mb-0"><small>Edit my submit <?php echo $editPost['postID'];?></small></p></a>
      <?php endif; ?>
    </div>
  </div>
<?php endforeach; ?>

<?php require __DIR__.'/viewings/footer.php'; ?>
