<?php

/**
 * database接続用の汎用クラス
 */
class DB
{
  private static $instance;

  static function getInstance(){
    if(!isset(self::$instance)){
      self::$instance = new DB();
    }
    return self::$instance;
  }

  function __construct()
  {
  }

  //PDO MySQL接続
  function connect($username, $password, $dbname){
      //ユーザ名やDBアドレスの定義
      $dsn = 'mysql:dbname='.$dbname.';host=localhost;charset=utf8';

      try {
          $pdo = new PDO($dsn, $username);
      } catch (PDOException $e) {
          exit('' . $e->getMessage());
      }

      return $pdo;
  }
}
