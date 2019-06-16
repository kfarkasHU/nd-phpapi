<?php

require_once("core/requesttype.php");
require_once("core/route.php");
require_once("core/urlhelper.php");
require_once("core/handler.php");

class Wrapper {
    private static $Routes = array();

    public static function RegisterRoute($requestType, $url, $controllerName, $methodName) {
        $route = new Route($requestType, $url, $controllerName, $methodName);
        array_push(self::$Routes, $route);
    }

    public static function Listen() {
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $requestUrl = $_SERVER["REQUEST_URI"];

        $routes = self::FindRoutesByType($requestMethod);

        $activeRoute = null;
        foreach($routes as $route) {
            $routeString = json_encode($route);

            if(UrlHelper::IsRequestUriMatches($requestUrl, $route)) {
                $activeRoute = $route;

                break;
            }
        }

        if(!is_null($activeRoute))
            Handler::HandleRequest($activeRoute);
    }

    private static function FindRoutesByType($type) {
        $routesWithType = array();
        foreach(self::$Routes as $route) {
            if($route->RequestType == $type) {
                array_push($routesWithType, $route);
            }
        }

        return $routesWithType;
    }
}

?>
