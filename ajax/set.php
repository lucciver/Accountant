<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $database = require('../config.php');

  if (isset($_POST['id'])) {
    $stmt = $database->prepare("UPDATE `expenses` SET `amount` = :amount WHERE `id` = :id");
    $stmt->bindParam(':amount', $_POST['amount']);
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
  } else {
    $stmt = $database->prepare("INSERT INTO `expenses` (`friend`, `amount`, `description`) VALUES (:friend, :amount, :description)");
    $stmt->bindParam(':friend', $_POST['friend']);
    $stmt->bindParam(':description', $_POST['description']);
    $stmt->bindParam(':amount', $_POST['amount']);
    $stmt->execute();
  }
}
?>
