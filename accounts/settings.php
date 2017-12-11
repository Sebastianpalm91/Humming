<?php
declare(strict_types=1);
require __DIR__.'/../viewings/header.php';

?>
<div class="col-md-4 col-sm-8 mt-5">
  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">My submits</a>
    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
  </div>
  </div>
<div class="col-md-6 col-sm-8 mt-5">


  <div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">Something about me</div>
    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

      <?php $posts = myPosts($pdo) ?>
      <?php foreach($posts as $post):?>
        <div class="card col-sm-8 mt-2">
              <div class="card-header pt-1 pb-1">
                <?php echo $post['title'];?>
              </div>
              <div class="card-body pt-1 pb-1">
              <blockquote class="blockquote mb-0">
              <p class="mb-0">
                <?php echo $post['description']; ?>
              </p>
              <h5><?php echo $post['url']; ?></h5>
              <p class="mb-0"><small>
                <?php echo $post['postID'].'<br>'; ?>
              </small></p>
              <small><?php echo $post['date']; ?></small>
            </blockquote>
            <a href="/comments.php" class="badge badge-secondary"><p class="mb-0"><small>Comments</small></p></a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
      <a href="/php/delete.php?userID=<?php echo $_SESSION['users']['userID']; ?>"><button type="button" name="delete" class="list-group-item list-group-item-action mt-1">Delete account</button></a>
      <button type="button" method="post" name="changepw" class="list-group-item list-group-item-action mt-1">Change password</button>
    </div>
  </div>
</div>

<?php require __DIR__.'/../viewings/footer.php'; ?>
