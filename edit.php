<?php
require "database.php";
require "session.php";

$id = $_GET["id"];

$statement = $connection->prepare("SELECT * FROM contacts WHERE id = :id LIMIT 1;");
$statement->bindParam(":id", $id);
$statement->execute();

if ($statement->rowCount() == 0) {
  http_response_code(404);
  $_SESSION["alert"] = ["type" => "alert-warning", "message" => "Error: contact not found."];
  header("Location: home.php");
  return;
}

$contact = $statement->fetch(PDO::FETCH_ASSOC);

if ($contact["userid"] !== $_SESSION["user"]["id"]) {
  http_response_code(403);
  $_SESSION["alert"] = ["type" => "alert-danger", "message" => "Error: deleting the contact is not allowed for your account."];
  header("Location: home.php");
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

    $statement = $connection->prepare("UPDATE contacts SET name = :name, phone_number = :phone_number WHERE id = :id;");
    $statement->bindParam(":id", $id);
    $statement->bindParam(":name", $_POST["name"]);
    $statement->bindParam(":phone_number", $_POST["phone_number"]);

    $statement->execute();

    http_response_code(200);
    $_SESSION["alert"] = ["type" => "alert-success", "message" => "Contact {$_POST['name']} updated successfully."];
    header("Location: home.php");
    return;
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

<?php require "partials/footer.php"; ?>
