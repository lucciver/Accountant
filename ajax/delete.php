<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $database = require('../config.php');

  switch ($_POST['action']) {
    case 'expense':
      require("functions/delete/expense.php");
      break;
    case 'person':
      require("functions/delete/person.php");
      break;
  }
}
?>
