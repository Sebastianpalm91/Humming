<div class="m-4">
    <?php $posts = posts($pdo) ?>
    <?php foreach($posts as $post):?>
      <div class="card col-sm-8 mt-2">
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
              Submitted <?php echo $post['date'].' hours ago by '.$post['username']; ?>
            </p>
            <small></small>
          </blockquote>
          <a href="/comments.php" class="badge badge-secondary"><p class="mb-0"><small>Comments</small></p></a>
        </div>
      </div>
    <?php endforeach; ?>
  <nav>
    <ul class="pagination pagination-sm pt-4">
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
  <?php if (isset($_SESSION['users'])): ?>
    <div class="col-sm-8 p-0 pt-4">
    <form action="php/postNew.php" method="post">
      <div class="form-group">
        <label>New submit</label>
        <input type="text" class="form-control" name="title">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1"></label>
        <textarea class="form-control" name="description"rows="3"></textarea>
      </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">Example file input</label>
          <input type="file" class="form-control-file">
        </div>
      <button type="submit" class="btn btn-secondary btn-sm p-0 m-0">Save</button>
    </form>
    </div>
  <?php endif; ?>

</div>
