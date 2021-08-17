<?php

require_once("./phpapi/api.php");
require_once("./app/test-controller.php");

// TODO (sohamar): Proper namespace usage.
// TODO (sohamar): Optional parameters.
// TODO (sohamar): Request types as enum || different registration methods.
// TODO (sohamar): Multiple parameters, like /controller/action/:id/:mode/:sub-id/:sub-mode etc
// TODO (sohamar): Query params, like /controller/action/:id?:mode={mode}&:sub-id={sub-id}&@:sub-mode={sub-mode}
// TODO (sohamar): Add method-referencing support here.
// TODO (sohamar): Write documentation.
// TODO (sohamar): Write examples.
// TODO (sohamar): Add tests /Postman
// TODO (sohamar): Add tests /Node
// TODO (sohamar): Add tests /Index.html

$testControllerFactory = function() {
    return new TestController();
};

PhpAPI2\PhpAPI2Wrapper::RegisterPath("GET", "/test/get", $testControllerFactory, "testGetFn");
PhpAPI2\PhpAPI2Wrapper::RegisterPath("GET", "/test/get-with-param/:id", $testControllerFactory, "testGetFn");

PhpAPI2\PhpAPI2Wrapper::RegisterPath("DELETE", "/test/delete", $testControllerFactory, "testDeleteFn");
PhpAPI2\PhpAPI2Wrapper::RegisterPath("DELETE", "/test/delete-with-param/:id", $testControllerFactory, "testDeleteFnWithArg");

PhpAPI2\PhpAPI2Wrapper::RegisterPath("PUT", "/test/put-with-param/:id", $testControllerFactory, "testPutFnWithBodyArg");

PhpAPI2\PhpAPI2Wrapper::RegisterPath("POST", "/test/post-with-body", $testControllerFactory, "testPostFnWithParamArg");
PhpAPI2\PhpAPI2Wrapper::RegisterPath("POST", "/test/post-with-param/:id", $testControllerFactory, "testPostFnWithBodyArg");
PhpAPI2\PhpAPI2Wrapper::RegisterPath("POST", "/test/post-with-both/:id", $testControllerFactory, "testPostFnWithBothArgs");

PhpAPI2\PhpAPI2Wrapper::RegisterPath("PATCH", "/test/patch-with-body", $testControllerFactory, "testPatchFn");

PhpAPI2\PhpAPI2Wrapper::Listen();

?>