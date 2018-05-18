<?php

/**
 *
 */
require('db.php');
class Ranking
{
  private static $instance;

  static function getInstance(){
    if(!isset(self::$instance)){
      self::$instance = new Ranking();
    }
    return self::$instance;
  }

  function __construct()
  {
  }

  //PDO MySQL接続
  function getRankingData($id){
    $db = DB::getInstance();
    $pdo = $db->connect('testuser', 'password', 'qiita');
    try {
        //今回ここではSELECT文を送信している。UPDATE、DELETEなどは、また少し記法が異なる。
        $sql = "SELECT * FROM `unity` WHERE `id` = '". $id. "'";
        $dbres = $pdo->query($sql);
        $dbret = $dbres->fetch();
        /*
        foreach ($dbret as $row) {
            //今回はただカラムを指定し、出力された文字列を結合して出力
            $res = $row['id'].',';
            $res .= $row['name'].',';
            $res .= $row['point'].',';
            $res .= $row['data']."\n";
        }
        */
        $res = $dbret['id'].',';
        $res .= $dbret['name'].',';
        $res .= $dbret['point'].',';
        $res .= $dbret['data']."\n";

    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }

    $pdo = null;    //DB切断

    return $res;
  }
}