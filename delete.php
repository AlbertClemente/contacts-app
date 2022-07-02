<?php
require "database.php";
require "session.php";


$id = $_GET["id"];

$statement = $connection->prepare("SELECT * FROM contacts WHERE id = :id LIMIT 1;");
$statement->bindParam(":id", $id);
$statement->execute();

if ($statement -> rowCount() == 0) {
  http_response_code(404);
  $_SESSION["alert"] = ["type" => "alert-warning", "message" => "Error: contact not found."];
  header("Location: home.php");
  return;
}

$contact = $statement -> fetch(PDO::FETCH_ASSOC);

if ($contact["userid"] !== $_SESSION["user"]["id"]) {
  http_response_code(403);
  $_SESSION["alert"] = ["type" => "alert-danger", "message" => "Error: deleting the contact is not allowed for your account."];
  header("Location: home.php");
  return;
} 

$statement = $connection->prepare("DELETE FROM contacts WHERE id = :id;");
$statement->bindParam(":id", $id);
$statement->execute();

http_response_code(200);
$_SESSION["alert"] = ["type" => "alert-success", "message" => "Contact {$contact['name']} removed successfully."];
header("Location: home.php");
return;
