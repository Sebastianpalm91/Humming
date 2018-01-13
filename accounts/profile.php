<?php
declare(strict_types=1);
require __DIR__.'/../viewings/header.php';
?>
<div class="mt-5">
  <?php $profiles = myProfile($pdo) ?>
  <?php foreach($profiles as $profile):?>
    <div class="col-md-8 mx-auto">
      <div class="card mt-2">
        <img class="profilePic mb-3" src=" <?php if(isset($profile['picture'])): ?>
          <?php echo "../profileImages/".$profile['picture']; ?>
        <?php else: echo "../profileImages/potato.jpg"; ?>
        <?php endif; ?>" alt="">
        <div class="card-body pt-1 pb-1">
          <blockquote class="blockquote mb-0">
            <p class="mb-0">
              <small class="font-weight-light"><p>Hello, </small> <?php echo $profile['username'];?></p>
              <small class="font-weight-light"><p>About me</small><br><?php echo $profile['bio'];?></p>
              <?php if (!isset($profile['bio'])): ?>
                   <p class="smallfont italic mt-0 pt-0"><em>This user hasn't written anything yet</em></p>
              <?php endif; ?>
              <small class="font-weight-light"><p>Email:</small> <?php echo $profile['email'];?></p>
            </blockquote>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <?php require __DIR__.'/../viewings/footer.php'; ?>
