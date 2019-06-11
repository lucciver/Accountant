<?php
if (isset($_POST['id'])) {
  $stmt = $conn->prepare("UPDATE `debt` SET `amount` = :amount WHERE `id` = :id");
  $stmt->bindParam(':amount', $_POST['amount']);
  $stmt->bindParam(':id', $_POST['id']);
  $stmt->execute();
} else {
  $stmt = $conn->prepare("INSERT INTO `debt` (`friend`, `amount`, `description`) VALUES (:friend, :amount, :description)");
  $stmt->bindParam(':friend', $_POST['friend']);
  $stmt->bindParam(':description', $_POST['description']);
  $stmt->bindParam(':amount', $_POST['amount']);
  $stmt->execute();
}
?>
