<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>Contacts App</title>
</head>

<body class="d-flex flex-column min-vh-100 <?php if ($_SERVER["REQUEST_URI"] == "/contacts-app/index.php" || $_SERVER["REQUEST_URI"] == "/contacts-app/") : echo "bck-img";
                                            endif ?>">
  <header>
    <?php require "navbar.php" ?>
  </header>

  <main>

    <?php if (isset($_SESSION["alert"])) : ?>
      <div class="container pt-5 p-3">
        <div class="row">
          <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
              <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
              <?= $_SESSION["alert"]["message"] ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        </div>
      </div>
      <?php unset($_SESSION["alert"]) ?>
    <?php endif ?>

    <!-- Content here -->
