<?php

require_once('urlhelper.php');

class DataHelper {
    public static function GetHttpGetParams($route) {
        $url = $_SERVER['REQUEST_URI'];

        $routeArr = UrlHelper::GetUriTemplateArray($route->UrlTemplate);
        $requestArr = UrlHelper::GetUriTemplateArray($url);

        $returnArray = array();
        for($i = 0; $i < count($routeArr); $i++) {
            if(UrlHelper::IsParameter($routeArr[$i]))
                array_push($returnArray, $requestArr[$i]);
        }

        return $returnArray;
    }
    public static function GetHttpPostParams() {
        $data = array();
        foreach ($_POST as $key => $value) {
            $data[$key] = $value;
        }

        $dataObject = (object)$data;
        return $dataObject;
    }
}

?>
