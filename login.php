<?php
require "database.php";

$error = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["email"]) || empty($_POST["password"])) {
    $error = "Please, fill all the fields below.";
  } else if (!str_contains($_POST["email"], "@")) {
    $error = "Invalid email!";
  } else {
    $statement = $connection->prepare("SELECT * FROM users WHERE email = :email LIMIT 1;");
    $statement->bindParam(":email", $_POST["email"]);
    $statement->execute();

    if ($statement->rowCount() == 0) {
      $error = 'This email do not exists. Please choose check your credentials or <a href="signup.php">create an account</a>.';
    } else {
      $user = $statement -> fetch(PDO::FETCH_ASSOC);

      if (!password_verify($_POST["password"], $user["password"])) {
        $error = 'Invalid password.';
      } else {
        session_start();

        unset($user["password"]); //quitamos el password de la sesión.

        $_SESSION["user"] = $user;

        header("Location: home.php");
      }
    }
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

    <h2 class="mb-5">Login</h2>
    <form method="POST" action="login.php">
      <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email" required autocomplete="email" autofocus>
        </div>
      </div>
      <div class="row mb-3">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" name="password" required autocomplete="password" autofocus>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Sign in!</button>
    </form>
  </div>
</div>
</main>

<?php require "partials/footer.php"; ?>
