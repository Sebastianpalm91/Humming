<?php
declare(strict_types=1);
require __DIR__.'/viewings/header.php';
?>
<?php // TODO: do logic to get the specific posted form here and display it for the user here ?>

    <div class="card col-sm-8 mt-2">
      <blockquote class="blockquote mb-0">
        <?php foreach($posts as $user['userID'] => $post):?>
            <!-- CONTAIN WITHING THE LOOP MAKES IT LOOP WITH THE DATA.PHP -->
            <div class="card-body pt-1 pb-1">
                <!-- CHANGE NAME TO H2 TEXT TO P ATHUORE TO SOMETHING ELSE  -->
                <div class="card-header pt-1 pb-1" method="post"><?php echo $post['title']; ?></div>
                <p class="mb-0" method="post"><?php echo $post['description']; ?></p>
                <h5><?php echo $post['url']; ?></h5>
                <p class="mb-0"><small><?php echo $post['postID'].'<br>'; ?></small></p>
                <div><?php echo $post['date']; ?></div>
            </div>
        <?php endforeach; ?>
      </blockquote>
      <a href="/comments.php" class="badge badge-secondary"><p class="mb-0"><small>Comments</small></p></a>
    </div>
<?php // TODO: MAKE COMMENT BUTTON INVISIBLE IF LOGGED IN AND IF GETTING TO THIS PAGE ?>

<?php if (isset($_SESSION['users'])): ?>
<div class="col-md-4 col-sm-8 m-2">
  <form>
    <div class="form-group">
      <label for="">Comment below</label>
      <textarea class="form-control" rows="3"></textarea>
    </div>
  </form>
  <a href="/php/comments.php?post=<?php echo $_SESSION['posts']['postID']; ?>"> <button type="button" class="btn btn-secondary btn-sm p-0 m-0">Save</button></a>
</div>
<?php endif; ?>

<?php // TODO: do logic to get the specific already commented comments on this post ?>

<?php require __DIR__.'/viewings/footer.php'; ?>
