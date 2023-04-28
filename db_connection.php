<?php
// Database credentials
$host = getenv("DB_HOST");
$username = getenv("DB_USER");
$password = getenv("DB_PASS");
$database = getenv("DB_NAME");

try {
  $conn = new PDO("mysql:host=$host; dbname=$database", $username, $password);
} catch (PDOException $exception) {
  echo "Connection to sql failed: " . $exception->getMessage();
}
