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
        <h2 class="mb-5">Add Contact</h2>
        <form>
          <div class="row mb-3">
            <label for="inputName" class="col-sm-2 col-form-label">Contact Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" name="inputName" required autocomplete="inputName" autofocus>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputTelf" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-10">
              <input type=" text" class="form-control" id="inputTelf" name="inputTelf" required autocomplete="inputTelf" autofocus>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Add contact</button>
        </form>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>
