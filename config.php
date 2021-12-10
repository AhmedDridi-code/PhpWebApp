<?php
class config {
  private static $pdo = NULL;
  public static function getConnection() {
    if (!isset(self::$pdo)) {
      try{
        self::$pdo = new PDO('mysql:host=localhost;dbname=farah', 'root', '',
          [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
          ]);
      }catch(Exception $e){
        die('Erreur: '.$e->getMessage());
      }
    }
    return self::$pdo;
  }
}
?>
