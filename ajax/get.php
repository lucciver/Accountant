<?php
  require('../config.php');

  $stmt = $conn->prepare("SELECT `id`, `firstname`, `lastname` FROM `debtor` WHERE 1");
  $stmt->execute();
  $friends = $stmt->fetchAll();

  foreach ($friends as $key => $friend) {
    $stmt = $conn->prepare("SELECT `id`, `amount`, `description` FROM `debt` WHERE `friend` = :id");
    $stmt->bindParam(':id', $friend['id']);
    $stmt->execute();
    $result = $stmt->fetchAll();

    $friends[$key]['expenses'] = $result;
  }

  echo json_encode($friends);
