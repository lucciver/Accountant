<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $database = require('../config.php');

  if ($_POST['action'] == "expense") {
    if (isset($_POST['id'])) {
      $stmt = $database->prepare("UPDATE `expenses` SET `amount` = :amount WHERE `id` = :id");
      $stmt->bindParam(':amount', $_POST['amount']);
      $stmt->bindParam(':id', $_POST['id']);
      $stmt->execute();
    } else {
      $stmt = $database->prepare("INSERT INTO `expenses` (`friend`, `amount`, `description`, `user`) VALUES (:friend, :amount, :description, :user)");
      $stmt->bindParam(':friend', $_POST['friend']);
      $stmt->bindParam(':description', $_POST['description']);
      $stmt->bindParam(':amount', $_POST['amount']);
      $stmt->bindParam(':user', $i=0);
      $stmt->execute();
    }
  } elseif ($_POST['action'] == "person") {
    $stmt = $database->prepare("INSERT INTO `friends`(`firstname`, `lastname`) VALUES (:first, :last)");
    $stmt->bindParam(':first', $_POST['first']);
    $stmt->bindParam(':last', $_POST['last']);
    $stmt->execute();
  }
}

header('Location: /index.php');
exit;
?>
