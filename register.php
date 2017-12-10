<?php
declare(strict_types=1);

// Always start by loading the default application setup.
require __DIR__.'/viewings/header.php';
?>
<div class="col-md-6 col-sm-6 mx-auto mt-5">
  <h3 class="pb-1 text-center">...Not much longer now...</h3>
  <p class="pb-4 text-center">Please provide us with the following information below</p>
  <form class="d-flex justify-content-center flex-column">
    <div class="column">
      <div class="col-md-6 mb-3 pl-0">
        <label for="validationDefault01">Choose a username</label>
        <input type="text" class="form-control" id="validationDefault01" placeholder="Username" required>
      </div>
      <div class="col-md-6 mb-3 pl-0">
        <label for="validationDefault02">Enter a valid email adress</label>
        <input type="text" class="form-control" id="validationDefault02" placeholder="Ex. Email@email.com"required>
      </div>
    </div>
    <div class="column">
      <div class="col-md-6 mb-3 pl-0">
        <label for="validationDefault03">Password</label>
        <input type="text" class="form-control" id="validationDefault03" placeholder="Password" required>
      </div>
      <div class="col-md-6 mb-3 pl-0">
        <label for="validationDefault04">Repeat Password...</label>
        <input type="text" class="form-control" id="validationDefault04" placeholder="Password" required>
      </div>
    </div>
    <button class="btn btn-dark mt-4" type="submit">Register</button>
  </form>
</div>
<?php require __DIR__.'/viewings/footer.php'; ?>
