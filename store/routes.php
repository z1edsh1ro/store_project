<?php 
$controllers=array('STORE'=>['index_STORE','product','logout','add','buy','search','type','order','delete','user','cart','history','pay','paid','ship','receive','received','rating','ratingConfirm']
,'ADMIN'=>['index','update','logout']
);
function call($controller,$action){
    require_once("controllers/".$controller."_CONTROLLER.php");
    switch($controller){
        case "pages": $controller= new PageController();break;
        case "STORE":require_once("model/PRODUCTMODEL.php");
                     require_once("model/CARTMODEL.php");
                     require_once("model/USERMODEL.php");
                     require_once("model/ORDERMODEL.php");
                     require_once("model/ORDER_DETAILMODEL.php");
                     $controller = new STORE_CONTROLLER(); break;
        case "ADMIN":require_once("model/ORDERMODEL.php");
                     require_once("model/ORDER_DETAILMODEL.php");
                     require_once("model/STATUSMODEL.php");
                     $controller = new ADMIN_CONTROLLER(); break;
    }
    $controller->{$action}();
}
if(array_key_exists($controller,$controllers)){
    if(in_array($action,$controllers[$controller])){
        call($controller,$action);
    }
    else{
        call('page','error');
    }
}
else{
    call('page','error');
}
?>