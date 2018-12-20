<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $database = require('config.php');

  $stmt = $database->prepare("INSERT INTO `expenses` (`friend`, `amount`, `description`) VALUES (:friend, :amount, :description)");
  $stmt->bindParam(':friend', $_POST['friend']);
  $stmt->bindParam(':description', $_POST['description']);
  $stmt->bindParam(':amount', $_POST['amount']);
  $stmt->execute();
}

header('Location: index.php');
exit;
?>
