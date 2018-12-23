<?php
  class Expense {
      public $id;
      public $firstname;
      public $lastname;

      function setId($id) {
        $this->id = $id;
      }

      function getId() {
        return $this->id;
      }

      function setFirstname($firstname) {
        $this->firstname = $firstname;
      }

      function getFirstname() {
        return $this->firstname;
      }

      function setLastname($lastname) {
        $this->lastname = $lastname;
      }

      function getLastname() {
        return $this->lastname;
      }
  }
?>
