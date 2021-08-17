<?php

namespace PhpAPI2 {
    require_once("utility/segment.php");
    require_once("utility/url.php");
    require_once("utility/params.php");
    require_once("utility/reflection.php");
    require_once("utility/path-cache.php");
    require_once("core/cors.php");
    require_once("core/listener.php");
    require_once("core/handler.php");

    class PhpAPI2Wrapper {
        public static function RegisterPath(
            $requestType,
            $relativeUri,
            $controllerFactory,
            $method
        ) {
            PathCache::Register($requestType, $relativeUri, $controllerFactory, $method);
        }

        public static function Listen($enableCors = false) {
            if($enableCors) {
                Cors::Enable();
            }
            $ref = Listener::Listen();
            $response = Handler::Handle($ref);
            echo $response;
        }
    }
}
?>
