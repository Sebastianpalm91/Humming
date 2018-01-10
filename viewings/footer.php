<div class="jumbotron jumbotron-fluid mt-5 mb-0 bg-dark text-light">
  <div class="container">
    <div class="col-md-4 col-sm-8 col-sm-10 mx-auto">
      <div class="d-flex justify-content-between">
        <ul class="flex-column p-0">
          About
          <li>
            <a class="anchor-color" href="#">Advertising</a> <br>
            <a class="anchor-color" href="#">About Humming</a> <br>
          </li>
        </ul>
        <ul class="flex-column p-0">
          Contact us
          <li>
            <a class="anchor-color" href="#">Email</a> <br>

          </li>
        </ul>
        <ul class="flex-column p-0">
          Donate <3
          <li>
            <a class="anchor-color" href="#">Donate</a> <br>
            <a class="anchor-color" href="#">Why donate?</a> <br>
          </li>
        </ul>
      </div>
    </div>
    <!-- <h1 class="display-3 text-center">Fluid jumbotron</h1> -->
    <p class="smallfont text-center">Use of this site constitutes acceptance of our User Agreement and Privacy Policy. © 2017 humming inc. All rights reserved.<br>
      HUMMING and the HUMMING Logo are registered trademarks of humming inc.</p>
  </div>
</div>
  <?php if (stripos($_SERVER['REQUEST_URI'], 'registerform')): ?>
    <script src="/js/userSearch.js"></script>
  <?php endif; ?>
    <script src="/js/voteCounter.js"></script>
    <script src="/js/voteDirCol.js"></script>
</body>
</html>
