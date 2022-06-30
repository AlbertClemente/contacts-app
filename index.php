<?php
if (file_exists("contacts.json")) {
  $contacts = json_decode(file_get_contents("contacts.json"), true);
} else {
  $contacts = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Contacts App</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Contacts App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add.php">Add Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div class="container pt-5 p-3">
      <div class="row row-cols-4">
        <?php if (count($contacts) == 0) : ?>
          <div class="col-12 mb-5">
            <div class="card text-center">
              <div class="card-body">
                <p class="card-text m-2 mb-4">There are no contacts yet...</p>
                <a href="add.php" class="btn btn-secondary mb-2">Please, add one now :)</a>
              </div>
            </div>
          </div>
        <?php endif ?>

        <?php foreach ($contacts as $contact) : ?>
          <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-5">
            <div class="card text-center">
              <div class="card-body">
                <h3 class="card-title text-capitalize"><?= $contact["name"] ?></h3>
                <p class="card-text m-2"><?= $contact["phone_number"] ?></p>
                <a href="#" class="btn btn-secondary mb-2">Edit Contact</a>
                <a href="#" class="btn btn-danger mb-2">Delete Contact</a>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>
