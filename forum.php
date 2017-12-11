<div class="m-4">
<?php if (isset($_SESSION['users'])): ?>
  <div class="col-sm-8">
  <form action="php/postNew.php" method="post">
    <div class="form-group">
      <label for="exampleFormControlInput1">Title</label>
      <input type="text" class="form-control" name="title" id="exampleFormControlInput1">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1"></label>
      <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-secondary btn-sm p-0 m-0">Save</button>
  </form>
  </div>
<?php endif; ?>

<div class="m-4">
  <div class="card col-sm-8">
    <div class="card-header pt-1 pb-1">
      Quote
    </div>
    <div class="card-body pt-1 pb-1">
      <blockquote class="blockquote mb-0">
        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      </blockquote>
      <a href="/commentsform.php" class="badge badge-secondary"><p class="mb-0"><small>Comments</small></p></a>
    </div>
  </div>
  <div class="card col-sm-8 mt-2">
    <div class="card-header pt-1 pb-1">
      Quote
    </div>
    <div class="card-body pt-1 pb-1">
      <blockquote class="blockquote mb-0">
        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      </blockquote>
      <a href="/commentsform.php" class="badge badge-secondary"><p class="mb-0"><small>Comments</small></p></a>
    </div>
  </div>
  <div class="card col-sm-8 mt-2">
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
  <div class="card col-sm-8 mt-2">
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
  <div class="card col-sm-8 mt-2">
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
  <div class="card col-sm-8 mt-2">
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
  <nav>
    <ul class="pagination pagination-sm pt-2">
      <li class="page-item">
        <a class="page-link text-dark" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
      <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
      <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link text-dark" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </nav>
</div>
