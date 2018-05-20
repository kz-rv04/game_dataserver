<?php
require_once('resource_info.php');
$resInfo = ResourceInfo::getInstance();

//POSTうけとり
if(isset($_POST["name"]) && isset($_POST["score"])){
    $name = trim($_POST["name"]);
    $score = trim($_POST["score"]);
    if(is_numeric($score)){
        $resInfo->addData($name,(int)$score);
    }
}
