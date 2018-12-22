<?php
$stmt = $database->prepare("INSERT INTO `friends`(`firstname`, `lastname`) VALUES (:first, :last)");
$stmt->bindParam(':first', $_POST['first']);
$stmt->bindParam(':last', $_POST['last']);
$stmt->execute();
?>
