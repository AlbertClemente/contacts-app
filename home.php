<?php
require "database.php";
require "session.php";

$contacts = $connection->query("SELECT * FROM contacts WHERE userid = {$_SESSION['user']['id']}");
?>

<?php require "partials/header.php"; ?>

<div class="container pt-5 p-3">
  <div class="row row-cols-4">
    <?php if ($contacts->rowCount() == 0) : ?>
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
            <a href="edit.php?id=<?= $contact["id"] ?>" class="btn btn-secondary mb-2">Edit Contact</a>
            <a href="delete.php?id=<?= $contact["id"] ?>" class="btn btn-danger mb-2">Delete Contact</a>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>

<?php require "partials/footer.php"; ?>
