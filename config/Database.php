<?php

// DB class inherits from the native PHP PDO class
class Database extends PDO {

  // TODO: These should not be hardcoded
  private $host = '127.0.0.1';
  private $username = 'root';
  private $password = 'superdupersecret';
  private $database = 'courses';

  public function __construct() 
  {
      $default_options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      ];

      // Call the native PDO class' constructor
      parent::__construct("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password, $default_options);
  }
}