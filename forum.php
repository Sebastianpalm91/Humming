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
            <p class="mb-0"><small>
              <?php echo $post['postID'].'<br>'; ?>
            </small></p>
            <small><?php echo $post['date']; ?></small>
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
        <label for="exampleFormControlInput1">New submit</label>
        <input type="text" class="form-control" name="title" id="exampleFormControlInput1">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1"></label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">Example file input</label>
          <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
      <button type="submit" class="btn btn-secondary btn-sm p-0 m-0">Save</button>
    </form>
    </div>
  <?php endif; ?>

</div>
