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
        public static function GetUriParams($request) {
            return array(new Param("b", "ALMA"));
        }
        public static function GetBodyParams($request) {
            return array(new Param("c", "BÉKA"));
        }
        public static function GetQueryParams($request) {
            return array();
        }
    }
}
?>