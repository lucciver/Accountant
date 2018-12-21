<?php
  $host = 'HOST';
  $db   = 'DATABASE';
  $user = 'USERNAME';
  $pass = 'PASSWORD';
  $charset = 'utf8mb4';

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  return new PDO($dsn, $user, $pass, $options);
?>
