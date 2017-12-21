<div class="m-4">
  <?php $submits = posts($pdo) ?>
  <?php foreach($submits as $submit => $value):?>
    <div class="card col-sm-8 mt-2">
      <div class="card-header pt-1 pb-1">
        <?php echo $value['title'];?>
      </div>
      <div class="card-body pt-1 pb-1">
        <blockquote class="blockquote mb-0">
          <p class="mb-0">
            <?php echo $value['description']; ?>
          </p>
          <h5><?php echo $value['url']; ?></h5>
          <p class="mb-0 smallfont">
            Submitted by: <?php echo $value['username'].' on '.$value['postdate'] ?>
          </p>
        </blockquote>
        <?php if (isset($_SESSION['users'])): ?>
          <div class="row p-0 m-0">
            <form action="/commentsform.php" method="GET">
              <button class="btn btn-dark text-light m-0 p-0 mr-1" type="submit" name="id" value="<?php echo $value['postID'] ?>">
                <a href="/commentsform.php"><p class="m-0 text-light smallfont">Comments</p></a>
              </button>
            </form>
            <?php if ($value['userID'] === $_SESSION['users']['userID']): ?>
              <form action="/editsubmit.php" method="GET">
                <button class="btn btn-dark text-light m-0 p-0 mr-1" type="submit" name="id" value="<?php echo $value['postID'] ?>">
                  <a href="/editsubmit.php" class="m-0 text-light smallfont"><p class="mb-0">Edit my submit</p></a>
                </button>
              </form>
              <form action="/php/deletePost.php" method="GET">
                <button class="btn btn-dark text-light m-0 p-0" type="submit" name="id" value="<?php echo $value['postID'] ?>">
                <a href="/php/deletePost.php?id=<?php echo $value['postID'] ?>" class="m-0 text-light smallfont"><p class="mb-0">Delete this submit</p>
                </a>
                </button>
              </form>
            <?php endif; ?>
            </div>
          <?php endif; ?>
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
      <ul class="nav nav-pills mb-3 mt-4" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link bg-dark text-light" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">New Submit</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="col-sm-8 p-0 pt-4">
            <form action="php/postNew.php" method="post">
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" required>
              </div>
              <div class="form-group">
                <label>Text</label>
                <textarea class="form-control" name="description"rows="3" required></textarea>
              </div>
              <button type="submit" class="btn btn-dark btn-sm m-0">Save</button>
            </form>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php if (!isset($_SESSION['users'])): ?>
      <label>Want to comment or post a submit?</label><br>
      <button class="btn btn-dark text-light">
        <a href="/registerform.php"><p class="m-0 text-light">Click here to register!</p></a>
      </button>
    <?php endif; ?>
  </div>
