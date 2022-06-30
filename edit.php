<?php
require "database.php";

$id = $_GET["id"];

$statement = $connection->prepare("SELECT * FROM contacts WHERE id = :id LIMIT 1;");
$statement->bindParam(":id", $id);
$statement->execute();

if ($statement->rowCount() == 0) {
  http_response_code(404);
  echo ("<h1>HTTP 404 NOT FOUND :(");
  return;
}

$contact = $statement->fetch(PDO::FETCH_ASSOC);

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"]) || empty($_POST["phone_number"])) {
    $error = "Please, fill all the fields.";
  } else if (strlen($_POST["phone_number"]) < 9) {
    $error = "Phone number must be at least 9 characters long";
  } else {
    $name = $_POST["name"];
    $phoneNumber = $_POST["phone_number"];

    $statement = $connection->prepare("UPDATE contacts SET name = :name, phone_number = :phone_number WHERE id = :id;");
    $statement->bindParam(":id", $id);
    $statement->bindParam(":name", $_POST["name"]);
    $statement->bindParam(":phone_number", $_POST["phone_number"]);

    $statement->execute();

    header("Location: index.php");
  }
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
      <div class="row">
        <?php if ($error) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $error ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif ?>

        <h2 class="mb-5">Edit contact <?= $contact["name"] ?></h2>
        <form method="POST" action="edit.php?id=<?= $contact["id"] ?>">
          <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Contact Name</label>
            <div class="col-sm-10">
              <input value="<?= $contact["name"] ?>" type="text" class="form-control" id="name" name="name" required autocomplete="name" autofocus>
            </div>
          </div>
          <div class="row mb-3">
            <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-10">
              <input value="<?= $contact["phone_number"] ?>" type=" text" class="form-control" id="phone_number" name="phone_number" required autocomplete="phone_number" autofocus>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Update contact</button>
        </form>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>
