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
            $result = array();
            $uri = $request["REQUEST_URI"];

            $uriTree = Segments::ToNodes($uri);
            $matchTree = Segments::ToNodes($match);

            for($i = 0; $i < count($matchTree); $i++) {
                Segments::IsParameter($matchTree[$i]) &&
                array_push(
                    $result,
                    new Param(
                        Segments::NormalizeParameter($matchTree[$i]),
                        $uriTree[$i]
                    )
                );
            }

            return $result;
        }
        public static function GetBodyParams($request) {
            return array();
        }
        public static function GetQueryParams($request) {
            return array();
        }
    }
}
?>