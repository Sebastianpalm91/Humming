<?php
declare(strict_types=1);
require __DIR__.'/../viewings/header.php';

?>

<div class="row">



  <div class="col-md-2 col-sm-4 mt-5">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="true">My submits</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="true">Settings</a>
      <a class="nav-link" id="v-pills-changepass-tab" data-toggle="pill" href="#v-pills-changepass" role="tab" aria-controls="v-pills-changepass" aria-selected="true">Change password</a>
    </div>
  </div>
  <div class="col-md-6 col-sm-8 mt-5">
    <?php if (isset($_SESSION['msg'])): ?>
      <?php echo $_SESSION['msg'] ?>
      <?php unset($_SESSION['msg']) ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['msg1'])): ?>
      <?php echo $_SESSION['msg1'] ?>
      <?php unset($_SESSION['msg1']) ?>
    <?php endif; ?>
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade" id="v-pills-profile" role="tab" aria-labelledby="v-pills-profile-tab">

        <?php $profiles = myProfile($pdo) ?>
        <?php foreach($profiles as $profile):?>
          <div class="card mt-2">
              <?php echo $profile['picture'];?>
            <div class="card-body pt-1 pb-1">
              <blockquote class="blockquote mb-0">
                <p class="mb-0">
              <small class="font-weight-light"><p>Username:</small> <?php echo $profile['username'];?></p>
              <small class="font-weight-light"><p>Bio:</small> <?php echo $profile['bio'];?></p>
              <small class="font-weight-light"><p>Email:</small> <?php echo $profile['email'];?></p>
              </blockquote>
            </div>
          </div>
        <?php endforeach; ?>
        <h3 class="mt-5">Change your profile below</h3>
        <form action="/php/changeProfile.php" method="post">
          <div class="form-groupmt-1">
            <label class="font-weight-light" for="username">New username</label>
            <input type="text" class="form-control" name="username">
          </div>

          <div class="form-group">
            <label class="font-weight-light" for="bio">New bio</label>
            <textarea class="form-control" name="bio" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label class="font-weight-light" for="email">New email</label>
            <input type="email" class="form-control" name="email"placeholder="name@example.com">
          </div>
            <button class="btn btn-dark mt-4 font-weight-light" type="submit">Save changes</button>
        </form>
      </div>
      <div class="tab-pane fade" id="v-pills-messages" role="tab" aria-labelledby="v-pills-messages-tab">
        <p>My submits</p>
        <?php $posts = myPosts($pdo) ?>
        <?php foreach($posts as $post):?>
          <div class="card mt-2">
            <div class="card-header pt-1 pb-1">
              <?php echo $post['title'];?>
            </div>
            <div class="card-body pt-1 pb-1">
              <blockquote class="blockquote mb-0">
                <p class="mb-0">
                  <?php echo $post['description']; ?>
                </p>
                <h5><?php echo $post['url']; ?></h5>
                <small><?php echo $post['date']; ?></small>
                <small>posted by: <?php echo $post['username']; ?></small>
              </blockquote>
              <a href="/comments.php" class="badge badge-secondary"><p class="mb-0"><small>Comments</small></p></a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="tab-pane fade col-md-5" id="v-pills-settings" role="tab" aria-labelledby="v-pills-settings-tab">
        <a class="btn-danger" href="/php/delete.php?userID=<?php echo $_SESSION['users']['userID']; ?>"><button type="button" name="delete" class="list-group-item list-group-item-action mt-1">Delete account</button></a>
      </div>
      <div class="tab-pane fade" id="v-pills-changepass" role="tab" aria-labelledby="v-pills-changepass-tab">
        <form action="../php/changePass.php" method="post" class="col-md-5 pl-0">
          <div class="form-group">
            <label for="password">New password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>
          <button type="submit" class="list-group-item list-group-item-action mt-1">Change password</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require __DIR__.'/../viewings/footer.php'; ?>
