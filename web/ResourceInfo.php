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

  function getAllData(){
    $db = DB::getInstance();
    
    $sql = "SELECT * FROM scoredata";
    $dbres = $db->query($sql);
    $dbret = $db->fetch($dbres);

    $result = "";
    foreach($dbret as $row){
      $result .= join(',',$row);
      $result .= '<br>';
    }

    $pdo = null;    //DB切断

    return $result;
  }
}
