<?php
require_once('resource_info.php');
$resInfo = ResourceInfo::getInstance();

//POSTうけとり
if(isset($_POST["num"])){
    $arg = trim($_POST["num"]);
    if(is_numeric($arg)){
        $num = (int)$arg;
        if($num > 0)
        {
            $res = $resInfo->getTopData($num);
        }
        else
        {
            $res = $resInfo->getAllData();
        }
        echo $res;
    }
}
