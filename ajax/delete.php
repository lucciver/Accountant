<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $database = require('config.php');

  $stmt = $database->prepare("DELETE FROM `expenses` WHERE `id` = :id");
  $stmt->bindParam(':id', $_POST['id']);
  $stmt->execute();
}
?>
