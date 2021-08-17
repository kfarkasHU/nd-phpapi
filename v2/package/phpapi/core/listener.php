<?php
namespace PhpAPI2 {
    class CallableReference {
        public function __construct(
            $pathRef,
            $uriParams,
            $bodyParams,
            $queryParams
        ) {
            $this->PathRef = $pathRef;
            $this->UriParams = $uriParams;
            $this->BodyParams = $bodyParams;
            $this->QueryParams = $queryParams;
        }
    }
    class Listener {
        public static function Listen() {
            $requestUrl = $_SERVER["REQUEST_URI"];
            $requestMethod = $_SERVER["REQUEST_METHOD"];

            $paths = PathCache::GetAllFilteredByRequestType($requestMethod);
            if(is_array($paths) && count($paths) === 0) throw new \Error("The request method was not found!");

            $requestedPathRef = UrlHelper::GetRequestedPath($requestUrl, $paths);
            if(is_null($requestedPathRef)) throw new \Error("The requested path was not found!");

            $requestUriParams = Params::GetUriParams($_SERVER);
            $requestBodyParams = Params::GetBodyParams($_SERVER);
            $requestQueryParams = Params::GetQueryParams($_SERVER);

            return new CallableReference($requestedPathRef, $requestUriParams, $requestBodyParams, $requestQueryParams);
        }
    }
}