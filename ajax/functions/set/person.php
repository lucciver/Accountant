<?php
$stmt = $conn->prepare("INSERT INTO `debtor` (`firstname`, `lastname`) VALUES (:first, :last)");
$stmt->bindParam(':first', $_POST['first']);
$stmt->bindParam(':last', $_POST['last']);
$stmt->execute();
?>
