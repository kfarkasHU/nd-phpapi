<?php

class UrlHelper {
    public static function IsRequestUriMatches($requestUri, $route) {
        $requestUriArr = self::GetUriTemplateArray($requestUri);
        $routeUriArr = self::GetUriTemplateArray($route->UrlTemplate);

        return self::IsUriArraysMatches($requestUriArr, $routeUriArr);
    }

    public static function GetUriTemplateArray($template) {
        $splitted = preg_split("#/#", $template);

        array_shift($splitted);

        return $splitted;
    }

    private static function IsUriArraysMatches($request, $template) {
        $templateCount = count($template);
        $requestCount = count($request);

        if ($requestCount > $templateCount)
            return false;

        for($i = 0; $i < $templateCount; $i++) {
            if(array_key_exists($i, $request)) {

                if($template[$i] == $request[$i]) {
                    continue;
                }
                else if($request[$i] == "") {

                }
                else if(self::IsParameter($template[$i])) {
                    continue;
                }
            }

            if(!self::IsOptional($template[$i]))
                return false;
        }

        return true;
    }

    public static function IsParameter($param) {
        $length = strlen($param);

        if($length > 0 && $param[0] == '{' && $param[$length - 1] == '}')
            return true;

        return false;
    }

    private static function IsOptional($param) {
        if(strlen($param) > 0) {
            if($param[1] == '@') {
                return true;
            }
        }
        return false;
    }
}

?>
