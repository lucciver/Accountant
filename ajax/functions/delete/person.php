<?php
$stmt = $database->prepare("DELETE FROM `friends` WHERE `id` = :id");
$stmt->bindParam(':id', $_POST['id']);
$stmt->execute();
?>
