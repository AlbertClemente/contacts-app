<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <?php if (isset($_SESSION["user"])) : ?>
      <a class="navbar-brand" href="home.php">Contacts App</a>
    <?php else : ?>
      <a class="navbar-brand" href="index.php">Contacts App</a>
    <?php endif ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if (isset($_SESSION["user"])) : ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add.php">Add Contact</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.php">Create an account</a>
          </li>
        <?php endif ?>
      </ul>
      <?php if (isset($_SESSION["user"])) : ?>
        <ul class="navbar-nav d-flex">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION["user"]["email"] ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="logout.php">Log out</a></li>
            </ul>
          </li>
        </ul>
      <?php endif ?>
    </div>
  </div>
</nav>
