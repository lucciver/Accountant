<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $database = require('../config.php');

  switch ($_POST['action']) {
    case 'expense':
      require("functions/set/expense.php");
      break;
    case 'person':
      require("functions/set/person.php");
      break;
  }
}
?>
