<?php
declare(strict_types=1);
require __DIR__.'/viewings/header.php';
?>
<?php // TODO: do logic to get the specific posted form here and display it for the user here ?>

<div class="m-4">
  <div class="card col-sm-8">
    <div class="card-header pt-1 pb-1">
      Quote
    </div>
    <div class="card-body pt-1 pb-1">
      <blockquote class="blockquote mb-0">
        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      </blockquote>
      <a href="/comments.php" class="badge badge-secondary"><p class="mb-0"><small>Comments</small></p></a>
    </div>
  </div>
</div>
<?php // TODO: MAKE COMMENT BUTTON INVISIBLE IF LOGGED IN AND IF GETTING TO THIS PAGE ?>

<?php if (isset($_SESSION['users'])): ?>
<div class="col-md-4 col-sm-8 m-2">
  <form>
    <div class="form-group">
      <label for="">Comment below</label>
      <textarea class="form-control" rows="3"></textarea>
    </div>
  </form>
  <button type="button" class="btn btn-secondary btn-sm p-0 m-0">Save</button>
</div>
<?php endif; ?>

<?php // TODO: do logic to get the specific already commented comments on this post ?>

<?php require __DIR__.'/viewings/footer.php'; ?>
