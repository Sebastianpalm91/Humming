<?php
declare(strict_types=1);
require __DIR__.'/../viewings/header.php';

?>

<div class="row ml-1">



  <div class="col-md-2 col-sm-4 mt-5">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active bg-dark text-light mb-1" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
      <a class="nav-link bg-dark text-light mb-1" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">My submits</a>
      <a class="nav-link bg-dark text-light mb-1" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
      <a class="nav-link bg-dark text-light mb-1" id="v-pills-changepass-tab" data-toggle="pill" href="#v-pills-changepass" role="tab" aria-controls="v-pills-changepass" aria-selected="false">Change password</a>
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
      <div class="tab-pane fade show active" id="v-pills-profile" role="tab" aria-labelledby="v-pills-profile-tab">

        <?php $profiles = myProfile($pdo) ?>
        <?php foreach($profiles as $profile):?>
          <div class="card mt-2">
            <img class="profilePic" src=" <?php if(isset($profile['picture'])): ?>
            <?php echo "../profileImages/".$profile['picture']; ?>
          <?php else: echo "../images/potato.jpg"; ?>
            <?php endif; ?>" alt="">
            <div class="card-body pt-1 pb-1">
              <blockquote class="blockquote mb-0">
                <p class="mb-0">
                  <small class="font-weight-light"><p>Hello</small> <?php echo $profile['username'];?>!</p>
                  <small class="font-weight-light"><p>About myself</small><br> <?php echo $profile['bio'];?></p>
                  <small class="font-weight-light"><p>Email:</small> <?php echo $profile['email'];?></p>
                </blockquote>
              </div>
            </div>
          <?php endforeach; ?>
          <h3 class="mt-5">Change your profile below</h3>
          <form action="/php/changeProfile.php" method="post" enctype="multipart/form-data">
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
              <input type="email" class="form-control" name="email" placeholder="name@example.com">
            </div>
              <div class="form-group">
                <label>Change avatar</label>
                <input type="file" class="form-control-file" name="picture">
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
                  <p class="mb-0 smallfont">
                    Submitted by: <?php echo $post['username'].' on '.$post['postdate'] ?>
                  </p>
                </blockquote>
                <form action="/commentsform.php" method="GET">
                  <button class="btn btn-dark text-light m-0 p-0 mr-1" type="submit" name="id" value="<?php echo $post['postID'] ?>">
                    <a href="/commentsform.php"><p class="m-0 text-light smallfont">Comments</p></a>
                  </button>
                </form>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="tab-pane fade col-md-5" id="v-pills-settings" role="tab" aria-labelledby="v-pills-settings-tab">
          <a class="btn-danger" href="/php/delete.php?userID=<?php echo $_SESSION['users']['userID']; ?>">
            <button type="button" name="delete" class="list-group-item list-group-item-action mt-1">Delete account</button>
          </a>
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
