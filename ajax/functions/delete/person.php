<?php
$stmt = $conn->prepare("DELETE FROM `debtor` WHERE `id` = :id");
$stmt->bindParam(':id', $_POST['id']);
$stmt->execute();
?>
