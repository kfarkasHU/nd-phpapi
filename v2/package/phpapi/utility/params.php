<?php
namespace PhpAPI2 {
    class Param {
        public function __construct(
            $name,
            $value
        ) {
            $this->Name = $name;
            $this->Value = $value;
        }
    }

    class Params {
        public static function GetUriParams($request, $match) {           
            function IsParameter($segment) {
                return substr($segment, 0, 1) === ":";
            }
            function RemoveParameterMark($segment) {
                $length = strlen($segment);
                return substr($segment, 1, $length - 1);
            }

            $result = array();
            $uri = $request["REQUEST_URI"];

            $uriTree = self::ToNodes($uri);
            $matchTree = self::ToNodes($match);

            for($i = 0; $i < count($matchTree); $i++) {
                IsParameter($matchTree[$i]) && array_push($result, new Param(RemoveParameterMark($matchTree[$i]), $uriTree[$i]));
            }

            return $result;
        }
        public static function GetBodyParams($request) {
            return array(new Param("c", "BÉKA"));
        }
        public static function GetQueryParams($request) {
            return array();
        }

        // TODO (sohamar): Move to utility.
        private static function ToNodes($str) {
            return explode("/", $str);
        }
    }
}
?>