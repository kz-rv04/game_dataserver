<?php
require_once('resource_info.php');
$resInfo = ResourceInfo::getInstance();

//POSTうけとり
if(isset($_POST["name"]) && isset($_POST["score"]) && isset($_POST["level"])){
    $name = trim($_POST["name"]);
    $score = trim($_POST["score"]);
    $level = trim($_POST["level"]);
    if(is_numeric($score) && is_numeric($level)){
        $resInfo->addData($name,(int)$score,(int)$level);
    }
}
