<?php
namespace PhpAPI2 {
    // TODO (sohamar): Rename this to ```Url```.
    class Url {
        public static function GetRequestedPath($request, $paths) {
            foreach($paths as $path) {
                if(self::IsPathMatch($request, $path->RelativeUri)) {
                    return $path;
                }
            }
            return NULL;
        }

        private static function IsPathMatch($request, $path) {
            echo "$request<br/>";
            echo "$path<br/>";
            return true;
        }
    }
}
?>
