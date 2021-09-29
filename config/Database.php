<?php

class Database {

  private $host = 'localhost:3306';
  private $user = 'root';
  private $password = 'superdupersecret';
  private $database = 'courses';

  private $db;

  public function __construct()
  {
      $this->db = new mysqli($host, $user, $password, $database);

      // Error handler
      if ($this->db->connect_errno > 0) {
          die('Error occurred at connection' . $this->db->connect_error);
      }
  }
}