<?php

/**
 *
 */
require(__DIR__."/db.php");
class ResourceInfo
{
  private static $instance;


  static function getInstance(){
    if(!isset(self::$instance)){
      self::$instance = new ResourceInfo();
    }
    return self::$instance;
  }

  function __construct()
  {
  }

  function makeText($dbret){
    $result =  "";

    if($dbret)
    {
      foreach($dbret as $row){
        $result .= join(',',$row);
        $result .= '<br>';
      }
    }

    return $result;
  }

  function getAllData(){
    $db = DB::getInstance();
    
    $sql = "SELECT name, score FROM scoredata ORDER BY scoredata.score DESC";
    $dbres = $db->query($sql);
    $dbret = $db->fetch($dbres);

    $result = self::makeText($dbret);

    $pdo = null;    //DB切断

    return $result;
  }

  /*
   上位$num件のスコアデータを取得する
   */
  function getTopData($num){
    $db = DB::getInstance();

    //$sql = "SELECT name, score FROM scoredata ORDER BY scoredata.score DESC LIMIT $num";
    //$dbres = $db->query($sql);
    $sql = "SELECT name, score FROM scoredata ORDER BY scoredata.score DESC LIMIT ?";
    $dbres = $db->query($sql,[$num]);
    $dbret = $db->fetch($dbres);

    $result = self::makeText($dbret);
    
    $pdo = null;    //DB切断

    return $result;
  }

  function addData($name,$score){
    $db = DB::getInstance();

    //$sql = "INSERT INTO scoredata (name,score) VALUES ('$name',$score)";
    //$dbres = $db->query($sql);
    $sql = "INSERT INTO scoredata (name,score) VALUES (?,?)";
    $dbres = $db->query($sql, [$name,$score]);
    if($dbres !== false){
      echo "INSERTSuccess";
    }
    else
    {
      echo "INSERTFailed";
    }
  }
}
