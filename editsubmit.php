<?php require __DIR__.'/viewings/header.php'; ?>
<div class="m-4">
<?php $editPosts = editPosts($pdo) ?>
<?php foreach($editPosts as $editPost => $value):?>
  <div class="card col-sm-8 mt-2">
        <div class="card-header pt-1 pb-1">
          <?php echo $value['title'];?>
        </div>
        <div class="card-body pt-1 pb-1">
        <blockquote class="blockquote mb-0">
        <p class="mb-0">
          <?php echo $value['description']; ?>
        </p>
        <h5><?php echo $value['url']; ?></h5>
        <p class="mb-0 smallfont">
          Submitted by: <?php echo $value['username'].' on '.$value['postdate']; ?>
        </p>
        <small></small>
      </blockquote>

    </div>
  </div>
  <?php if ($_SESSION['users']['userID']):?>
    <div class="col-sm-8 p-0 pt-4">
      <form action="php/saveEditSubmit.php" method="POST">
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control" name="updateTitle" value="<?php echo $value['title'] ?>" required>
        </div>
        <div class="form-group">
          <label>Text</label>
          <textarea class="form-control" name="updateDesc"rows="3" required><?php echo $value['description']?></textarea>
        </div>
        <input type="hidden" name="id" value="<?php echo $value['postID'] ?>">
        <button type="submit" class="btn btn-dark btn-sm m-0" value="<?php echo $value['postID'] ?>">Save</button>
      </form>
    </div>
  </div>
<?php endif; ?>
<?php endforeach; ?>
<?php require __DIR__.'/viewings/footer.php'; ?>
