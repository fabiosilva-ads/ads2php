<?php

class Conexao {
  private static $servername = "localhost";
  private static $username = "root";
  private static $password = "";
  private static $db = "ads2php";
  private static $conn = null;

  public function __construct() {
    die ("A função init não é permitida");
  }

  public static function conectar() {
    if (null==self::$conn) {
      try {
        self::$conn = new PDO("mysql:host=".self::$servername.";dbname=".self::$db, self::$username, self::$password);
      } 
      catch(PDOException $e) {
        die ("Falha na conexão: " . $e->getMessage());
      }
    } 
    return self::$conn;
  }
  public static function desconectar() {
    self::$conn = null;
  }
}

?>