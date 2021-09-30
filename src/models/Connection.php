<?php

namespace App\models;

use PDO;
use PDOException;

class Connection
{
   private static $instance = null;
   private $conn;

   private function __construct()
   {

      try {
         $this->conn = new PDO('mysql:host=' . $_ENV['DB_HOST_NAME'] . '; dbname=' . $_ENV['DB_NAME'],
            $_ENV['USER_DB'], $_ENV['PASS_DB']);
         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
         die("Erro na conexão com MySQL! " . $e->getMessage());
      }
   }

   static function getInstance()
   {
      if (self::$instance == null) {
         self::$instance = new Connection();
      }
      return self::$instance;
   }
}