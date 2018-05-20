<?php
require_once('ResourceInfo.php');
$resInfo = ResourceInfo::getInstance();

//POSTうけとり
if(isset($_POST)){
    $res = $resInfo->getAllData();
    var_dump($res);
    exit();
}
