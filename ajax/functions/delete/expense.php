<?php
$stmt = $conn->prepare("DELETE FROM `debt` WHERE `id` = :id");
$stmt->bindParam(':id', $_POST['id']);
$stmt->execute();
?>
