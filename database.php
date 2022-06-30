<?php
  $host = "localhost";
  $database = "contacts_app";
  $user = "tico";
  $password = "Cle25081984!";

  try {
    $connection = new PDO("mysql:host=$host; dbname=$database", $user, $password);
  } catch (PDOException $error) {
    die("PDO Connection Error: " . $error -> getMessage());
  }
