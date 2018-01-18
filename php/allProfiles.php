<?php
declare(strict_types=1);
require __DIR__.'/../viewings/header.php';
?>
<?php $userProfiles = userProfile($pdo) ?>
<?php foreach ($userProfiles as $userProfile => $value): ?>
  <div class="m-5">
    <div class="col-md-8 mx-auto">
      <div class="card mt-2">
        <img class="profilePic" src="
        <?php if(isset($value['picture'])): ?>
        <?php echo "/../profileImages/".$value['picture']; ?>
      <?php else: echo "/../images/potato.jpg"; ?>
        <?php endif; ?>" alt="">
        <div class="card-body pt-1 pb-1">
          <blockquote class="blockquote mb-0">
            <p class="mb-0">
              <small class="font-weight-light"><p>Username:</small> <?php echo $value['username'];?></p>
              <small class="font-weight-light"><p>About me</small><br><?php echo $value['bio'];?></p>
              <?php if (!isset($value['bio'])): ?>
                <p class="smallfont italic mt-0 pt-0"><em>This user hasn't written anything yet</em></p>
              <?php endif; ?>
              <small class="font-weight-light"><p>Email:</small> <?php echo $value['email'];?></p>
           </blockquote>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <?php require __DIR__.'/../viewings/footer.php'; ?>
