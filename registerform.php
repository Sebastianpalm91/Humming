<?php
declare(strict_types=1);

// Always start by loading the default application setup.
require __DIR__.'/viewings/header.php';

?>
<div class="col-md-6 col-sm-6 mx-auto mt-5">
  <h3 class="pb-1 text-center">...Not much longer now...</h3>
  <p class="pb-4 text-center">Please provide us with the following information below</p>
  <form action="/user/register.php" method="post" class="d-flex justify-content-center flex-column">
    <div class="column">
      <div class="col-md-6 mb-3 pl-0">
        <label>Choose a username</label>
        <input type="text" name="username" class="form-control searchUser" placeholder="Username" required>
        <p class="alreadyExists"></p>
      </div>
      <div class="col-md-6 mb-3 pl-0">
        <label>Enter a valid email adress</label>
        <input type="email" name="email" class="form-control" placeholder="Ex. Email@email.com"required>
      </div>
    </div>
    <div class="column">
      <div class="col-md-6 mb-3 pl-0">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>
      <div class="col-md-6 mb-3 pl-0">
        <label>Repeat Password...</label>
        <p>
          <?php if (isset($_SESSION['registerError']['passwordNoMatch'])): echo $_SESSION['registerError']['passwordNoMatch']?>
            <?php unset($_SESSION['registerError']['passwordNoMatch']) ?>
          <?php endif; ?>
        </p>
        <input type="password" name="passwordVerify" class="form-control" placeholder="Password" required>
      </div>
    </div>
    <button class="btn btn-dark mt-4" type="submit">Register</button>
  </form>
</div>
<?php require __DIR__.'/viewings/footer.php'; ?>
