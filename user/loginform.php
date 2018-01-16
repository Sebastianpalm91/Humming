<?php
declare(strict_types=1);

// Always start by loading the default application setup.
require __DIR__.'/../viewings/header.php';

?>
<!-- login -->
<form action="../php/login.php" method="post" class="mx-auto mt-5 col-md-3 col-sm-6 col-sm-4">
  <?php if (isset($_SESSION['loginErr'])): ?>
    <p class=text-danger><?php echo $_SESSION['loginErr'] ?></p>
    <?php unset($_SESSION['loginErr']) ?>
  <?php endif; ?>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password">
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      Remember me!
    </label>
    <button type="submit" class="ml-5 btn btn-dark">Login</button>
  </div>
</form>
<?php require __DIR__.'/../viewings/footer.php'; ?>
