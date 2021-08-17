<?php
namespace PhpAPI2 {
    class Segments {
        public static function ToNodes($uri) {
            return explode("/", $uri);
        }
        public static function IsParameter($segment) {
            return substr($segment, 0, 1) === ":";

        }
        public static function NormalizeParameter($segment) {
            $length = strlen($segment);
            return substr($segment, 1, $length - 1);           
        }
    }
}
?>
