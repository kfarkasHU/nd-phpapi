<?php
namespace PhpAPI2 {
    class UrlHelper {
        public static function GetRequestedPath($request, $paths) {
            foreach($paths as $path) {
                if(self::IsPathMatch($request, $path)) {
                    return $path;
                }
            }
            return NULL;
        }

        private static function IsPathMatch($request, $path) {
            return true;
        }
    }
}
?>
