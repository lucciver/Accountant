<?php
  $database = require('../../config.php');

  $stmt = $database->prepare("SELECT `id`, `firstname`, `lastname` FROM `friends` WHERE 1");
  $stmt->execute();
  $friends = $stmt->fetchAll();

  foreach ($friends as $key => $friend) {
    $stmt = $database->prepare("SELECT `id`, `amount`, `description` FROM `expenses` WHERE `friend` = :id");
    $stmt->bindParam(':id', $friend['id']);
    $stmt->execute();
    $result = $stmt->fetchAll();

    $friends[$key]['expenses'] = $result;
  }

  echo json_encode($friends);
