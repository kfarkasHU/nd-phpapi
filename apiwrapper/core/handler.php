<?php

require_once("datahelper.php");

class Handler {
    public static function HandleRequest($route) {
        $controllerInstance = new $route->Controller();
        $actionName = $route->Action;

        $hasGetData = self::HasGetData($route);
        $hasPostData = self::HasPostData($route);

        if ($hasPostData && $hasGetData) {
            $postData = DataHelper::GetHttpPostParams();
            $getData = DataHelper::GetHttpGetParams($route);

            $controllerInstance->$actionName($postData, ...$getData);
        }
        // GET & DELETE
        else if (!$hasPostData && $hasGetData){
            $getData = DataHelper::GetHttpGetParams($route);

            $controllerInstance->$actionName(...$getData);
        }
    }

    private static function HasGetData($route) {
        if(
            $route->RequestType == RequestType::POST ||
            $route->RequestType == RequestType::GET ||
            $route->RequestType == RequestType::DELETE
            )
            return true;

        return false;
    }

    private static function HasPostData($route) {
        if($route->RequestType == RequestType::POST)
            return true;

        return false;
    }
}

?>
