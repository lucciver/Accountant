<?php
  class Expense {
      public $id;
      public $friend;
      public $amount;
      public $description;

      function setId($id) {
        $this->id = $id;
      }

      function getId() {
        return $this->id;
      }

      function setFriend($friend) {
        $this->friend = $friend;
      }

      function getFriend() {
        return $this->friend;
      }

      function setAmount($amount) {
        $this->amount = $amount;
      }

      function getAmount() {
        return $this->amount;
      }

      function setDescription($description) {
        $this->description = $description;
      }

      function getDescription() {
        return $this->description;
      }
  }
?>
