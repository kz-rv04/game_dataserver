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
  /*
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
  */

  //PDO psql接続
  function connect($dsn, $url){
    try {
      $pdo = new PDO($dsn, $url['user'], $url['pass']);
    } catch (PDOException $e) {
        exit('' . $e->getMessage());
    }

    return $pdo;
  }

  function query($sql, $params = []){
    $url = parse_url(getenv('DATABASE_URL'));# herokuのpsql
  
    //$dsn = sprintf('pgsql:host=%s; port=%s; dbname=%s', $url['host'], $url['port'], substr($url['path'], 1));
    $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

    $pdo = self::connect($dsn, $url);

    if($params)
    {
        // bindparamする
    }
    else
    {
        try
        {
            $dbres = $pdo->query($sql);
        }
        catch (PDOException $e) {
            var_dump($e->getMessage());
            return false;
        }
    }
    return $dbres;
  }

  function fetch($query){
    try {
        $dbret = $query->fetchall(PDO::FETCH_ASSOC);
    } 
    catch (PDOException $e) {
        var_dump($e->getMessage());
        return false;
    }

    return $dbret;
  }
}
