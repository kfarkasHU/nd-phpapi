<?php

require_once("./phpapi/api.php");
require_once("./app/test-controller.php");

// TODO (sohamar): Write documentation.
// TODO (sohamar): Write examples.
// TODO (sohamar): Add tests /Node
// TODO (sohamar): Add injector
// TODO (sohamar): Injector -> Transient support
// TODO (sohamar): Injector -> Scoped support
// TODO (sohamar): Injector -> Singleton support
// TODO (sohamar): BaseController
// TODO (sohamar): BaseController -> Json
// TODO (sohamar): BaseController -> Ok(200)
// TODO (sohamar): BaseController -> NotFound(404)
// TODO (sohamar): BaseController -> InternalServerError(500)
// TODO (sohamar): BaseController -> StatusCode(code, data);
// TODO (sohamar): SQL support
// TODO (sohamar): SQL in docker
// TODO (sohamar): Sample app instead of demo with KnockoutJS (it should be a sample TODO app, without login)
// TODO (sohamar): ActionFilters (Wrapper::RegisterPath)

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