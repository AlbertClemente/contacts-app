<?php
require "database.php";
require "session.php";


$id = $_GET["id"];

$statement = $connection->prepare("SELECT * FROM contacts WHERE id = :id LIMIT 1;");
$statement->bindParam(":id", $id);
$statement->execute();

if ($statement -> rowCount() == 0) {
  http_response_code(404);
  echo("<h1>HTTP 404 NOT FOUND :(");
  return;
}

$contact = $statement -> fetch(PDO::FETCH_ASSOC);

if ($contact["userid"] !== $_SESSION["user"]["id"]) {
  http_response_code(403);
  echo ("<h1>UNAUTHORIZED :/");
  return;
} 

$statement = $connection->prepare("DELETE FROM contacts WHERE id = :id;");
$statement->bindParam(":id", $id);
$statement->execute();

header("Location: home.php");
