
<!-- Menu -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/index.php">Humming</a>
  <img src="../images/hummingLogo.png" width="35" height="30" class="d-inline-block align-top" alt="">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/news.php">News<span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item"> TODO IF needed add below
      <a class="nav-link" href="rcposts.php">Most recent posts</a>
    </li> -->
    <?php if (!isset($_SESSION['user'])):?>
      <li class="nav-item">
        <a href="../loginform.php" class="nav-link">Login</a>
      </li>
    <?php endif; ?>
    <?php if (isset($_SESSION['user'])):?>
      <li class="nav-item">
        <a href="../php/logout.php" class="nav-link">Logout</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profile
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../accounts/profile.php">My Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../accounts/settings.php">Settings</a>
        </div>
      </li>
      <p class="font-italic text-secondary mt-2 mb-0">Welcome, <?php echo $_SESSION['user']['name']; ?>!</p>
    <?php endif; ?>
    <?php if (!isset($_SESSION['user'])):?>
      <li class="nav-item">
        <a class="nav-link" href="/register.php">Not a member?</a>
      </li>
    <?php endif; ?>
  </ul>
  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>
</nav>
