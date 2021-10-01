<?php

include_once 'secrets.php';

// DB class inherits from the native PHP PDO class
class Database extends PDO {

  private $host = HOST;
  private $username = USER;
  private $password = PASSWORD;
  private $database = DATABASE;

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