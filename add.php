<?php
require "database.php";

if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  return;
}

$error = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"]) || empty($_POST["phone_number"])) {
    $error = "Please, fill all the fields.";
  } else if (strlen($_POST["phone_number"]) < 9) {
    $error = "Phone number must be at least 9 characters long";
  } else {
    $name = $_POST["name"];
    $phoneNumber = $_POST["phone_number"];

    $statement = $connection->prepare("INSERT INTO contacts (name, phone_number) VALUES(:name, :phone_number);");
    $statement->bindParam(":name", $_POST["name"]);
    $statement->bindParam(":phone_number", $_POST["phone_number"]);

    $statement->execute();

    header("Location: home.php");
  }
}
?>

<?php require "partials/header.php"; ?>

<div class="container pt-5 p-3">
  <div class="row">
    <?php if ($error) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $error ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif ?>

    <h2 class="mb-5">Add Contact</h2>
    <form method="POST" action="add.php">
      <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Contact Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" required autocomplete="name" autofocus>
        </div>
      </div>
      <div class="row mb-3">
        <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-10">
          <input type=" text" class="form-control" id="phone_number" name="phone_number" required autocomplete="phone_number" autofocus>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Add contact</button>
    </form>
  </div>
</div>
</main>

<?php require "partials/footer.php"; ?>
