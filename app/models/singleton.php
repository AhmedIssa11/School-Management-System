<?php

 class DbConnection 
 {

     private $dsn = 'mysql:host=localhost;dbname=cs314';
     private $username="root";
     private $password="";
     private $db_name="last";
     private $database_connection;
     private static $instance;
     public static $Counter=0;
	 public $option = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
     
     public function __construct() 
     {
         $this->database_connection = new PDO($this->dsn ,$this->username,$this->password,$this->option);
         $this->database_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     }
     
     
     public static function getInstance()
     {
         if (self::$instance == null)
         {
             self::$instance = new DbConnection();
         }
         else
         {
             echo "Found";
         }
         
         return self::$instance;
     }
     
     public function getConnection()
     {
         return $this->database_connection;
     }
 }

?>