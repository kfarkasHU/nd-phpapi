<?php

require_once("./phpapi/api.php");
require_once("./app/test-controller.php");

// TODO (sohamar): Query params, like /controller/action/:id?:mode={mode}&:sub-id={sub-id}&@:sub-mode={sub-mode}
// TODO (sohamar): Add method-referencing support here.
// TODO (sohamar): Write documentation.
// TODO (sohamar): Write examples.
// TODO (sohamar): Add tests /Postman
// TODO (sohamar): Add tests /Node
// TODO (sohamar): Add tests /Index.html

use PhpApi2\PhpAPI2Wrapper as Wrapper;

$testControllerFactory = function() {
    return new TestController();
};

Wrapper::RegisterPath("GET", "/test/get", $testControllerFactory, "testGetFn");
Wrapper::RegisterPath("GET", "/test/get-with-param/:paramArg", $testControllerFactory, "testGetFnWithArg");

Wrapper::RegisterPath("DELETE", "/test/delete", $testControllerFactory, "testDeleteFn");
Wrapper::RegisterPath("DELETE", "/test/delete-with-param/:id", $testControllerFactory, "testDeleteFnWithArg");

Wrapper::RegisterPath("PUT", "/test/put-with-param/:id", $testControllerFactory, "testPutFnWithBodyArg");

Wrapper::RegisterPath("POST", "/test/post-with-body", $testControllerFactory, "testPostFnWithParamArg");
Wrapper::RegisterPath("POST", "/test/post-with-param/:id", $testControllerFactory, "testPostFnWithBodyArg");
Wrapper::RegisterPath("POST", "/test/post-with-both/:id", $testControllerFactory, "testPostFnWithBothArgs");

Wrapper::RegisterPath("PATCH", "/test/patch-with-body", $testControllerFactory, "testPatchFn");

Wrapper::Listen();

?>