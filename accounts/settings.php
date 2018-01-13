<?php
declare(strict_types=1);
require __DIR__.'/../viewings/header.php';
?>
<div class="pointerEvents">
<div class="row ml-1 mr-2">
  <div class="col-md-2 col-sm-4 mt-5 ">
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
          <?php else: echo "../profileImages/potato.jpg"; ?>
            <?php endif; ?>" alt="">
            <div class="card-body pt-1 pb-1">
              <blockquote class="blockquote mb-0">
                <p class="mb-0">
                  <small class="font-weight-light"><p>Hello</small> <?php echo $profile['username'];?>!</p>
                  <small class="font-weight-light"><p>About myself</small><br> <?php echo $profile['bio'];?></p>
                  <?php if (!isset($profile['bio'])): ?>
                       <p class="smallfont italic mt-0 pt-0"><em>This user hasn't written anything yet</em></p>
                  <?php endif; ?>
                  <small class="font-weight-light"><p>Email:</small> <?php echo $profile['email'];?></p>
                </blockquote>
              </div>
            </div>
          <?php endforeach; ?>

          <h3 class="mt-5">Change your profile below</h3>
          <form action="/php/changeProfile.php" method="post" enctype="multipart/form-data">
            <div class="form-groupmt-1">
              <label class="font-weight-light" for="username">New username</label>
              <input type="text" class="form-control" name="username" value="<?php echo $profile['username'];?>">
            </div>
            <div class="form-group">
              <label class="font-weight-light" for="bio">New bio</label>
              <textarea class="form-control" name="bio" rows="3" value="<?php echo $profile['bio'];?>"> </textarea>
            </div>
            <div class="form-group">
              <label class="font-weight-light" for="email">New/old email to confirm</label>
              <input type="email" class="form-control" name="email" placeholder="name@example.com" value="<?php echo $profile['email'];?>" required>
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
              <div class="card col-sm-12 mt-2">
                <div class="card-body pl-0 pt-1 pb-1">
                  <div class="d-flex flex-column float-right voteFlex">
                    <?php $voteSum = voteSum($pdo, $post['postID'])?>
                    <input type="hidden" name="score" value="<?php echo $_POST['score'] ?>"> <?php // TODO: OPTIONAL HERE TRYING RESLOVE JSON INTERACTIVE VOTESUM ?>
                    <p class="voteSums m-0 p-0 pl-1 text-center" name="voteSums"> <?php echo $voteSum['score'] ?> </p>
                  </div>
                  <a href="/php/allProfiles.php?id=<?php echo $post['userID']?>">
                    <img class="float-left profilePicSubs mt-3 mr-3 " src=" <?php if(isset($post['picture'])): ?>
                    <?php echo "../profileImages/".$post['picture']; ?>
                    <?php else: echo "../profileImages/potato.jpg"; ?>
                    <?php endif; ?>" alt="">
                  </a>
                  <blockquote class="blockquote mb-0 ml-4 pl-4 mr-2">
                      <form class="col-10 text-truncate pl-0" action="/commentsform.php" method="GET">
                        <button class="btn btn-link m-0 p-0 pb-1 " type="submit" name="id" value="<?php echo $post['postID'] ?>">
                          <a class="anchor-color" href="/commentsform.php"><p class="m-0"><?php echo $post['title'];?></p></a>
                        </button>
                      </form>
                    <h5 class="m-0"><?php echo $post['url']; ?></h5>
                    <p class="mb-0 smallfont">
                        Submitted by: <a class="anchor-color" href="/php/allProfiles.php?id=<?php echo $post['userID']?>"><?php echo $post['username']?></a> on <?php echo $post['postdate'] ?>
                    </p>
                  </blockquote>
                  <?php if (isset($_SESSION['users'])): ?>
                    <div class="row p-0 m-0 ml-5">
                      <?php if ($post['userID'] === $_SESSION['users']['userID']): ?>
                        <form action="../editsubmit.php" method="GET">
                          <button class="btn btn-dark text-light m-0 p-0 mr-1" type="submit" name="id" value="<?php echo $post['postID'] ?>">
                            <a href="../editsubmit.php" class="m-0 text-light smallfont"><p class="mb-0">Edit my submit</p></a>
                          </button>
                        </form>
                        <form action="../php/deletePost.php" method="GET">
                          <button class="btn btn-dark text-light m-0 p-0" type="submit" name="id" value="<?php echo $post['postID'] ?>">
                          <a href="../php/deletePost.php?id=<?php echo $post['postID'] ?>" class="m-0 text-light smallfont"><p class="mb-0">Delete this submit</p>
                          </a>
                          </button>
                        </form>
                      <?php endif; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endforeach; ?>
        </div>
        <div class="tab-pane fade col-md-5" id="v-pills-settings" role="tab" aria-labelledby="v-pills-settings-tab">
            <button class=" deleteAccount list-group-item list-group-item-action mt-1">Delete account</button>
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
  </div>
  <div class="d-flex justify-content-center">
    <div class="deleteConfirm">
      <p class="text-center text-light pt-2 pb-2 m-0">Are you sure you whant to delete your account?</p>
        <a class="d-flex justify-content-center" href="/php/delete.php?userID=<?php echo $_SESSION['users']['userID']; ?>">
          <button class="smallfont m-1 mb-0 btn btn-danger text-light btn-sm m-0 p-0" type="button" name="delete">Delete account</button>
        </a>
        <p class="text-center text-light p-0 m-0">or</p>
        <a class="d-flex justify-content-center">
        <button class="smallfont m-1 mt-0 cancelDelete btn btn-success btn-sm text-light m-0 p-0" type="button">Cancel this madness</button>
        </a>
    </div>
  </div>

  <?php require __DIR__.'/../viewings/footer.php'; ?>
