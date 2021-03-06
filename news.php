<?php
declare(strict_types=1);
require __DIR__.'/viewings/header.php';
?>
<div id="carousel" class="carousel slide col-md-8 mx-auto pt-4" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1"></li>
    <li data-target="#carousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/images/newsp1.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/images/newsp2.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/images/newsp3.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php require __DIR__.'/viewings/footer.php'; ?>
