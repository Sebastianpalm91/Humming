<?php require __DIR__.'/viewings/header.php'; ?>
<div class="m-4">
  <?php $editPosts = editPosts($pdo) ?>
  <?php foreach($editPosts as $editPost => $value):?>
    <div class="card col-sm-8 mt-2 mb-2">
      <div class="card-body pl-0 pt-1 pb-1">
        <img class="float-left profilePicSubs mt-4 mr-3 " src=" <?php if(isset($value['picture'])): ?>
          <?php echo "../profileImages/".$value['picture']; ?>
        <?php else: echo "../profileImages/potato.jpg"; ?>
        <?php endif; ?>" alt="">
        <blockquote class="blockquote mb-0 ml-4 pl-4 ">
          <h2 class="border-bottom-1 mb-0 pb-2">
            <?php echo $value['title'];?>
          </h2>
          <p class="h6 font-weight-normal mb-1">
            <?php echo $value['description']  ?>
          </p>
          <a class="anchor-color" href="https://<?php echo $value['url']; ?>"><h6><?php echo $value['url']; ?></h6></a>
          <p class="mb-0 smallfont">
            Submitted by: <a class="anchor-color" href="/php/allProfiles.php?id=<?php echo $value['userID']?>"><?php echo $value['username']?></a> on <?php echo $value['postdate'] ?>
          </p>
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
          <label>Url</label>
          <input type="text" class="form-control" name="url" value="<?php echo $value['url'] ?>" required>
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
</div>
<?php endif; ?>
<?php endforeach; ?>
<?php require __DIR__.'/viewings/footer.php'; ?>
