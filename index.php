<?php

require_once("./apiwrapper/wrapper.php");
// require_once("./apiwrapper/module.php");

RegisterRoutes();
Wrapper::Listen();


function RegisterRoutes() {
    /**
     * Named parameters like {id}.
     *
     * In this cases, the factory will call the specified functions with all parameters from the call.
     * Eg:
     *   Delete/{id}
     *   TestController->DeleteTest({id});
     *  And
     *   Post/{id}
     *   TestController->PostTest({id}, {postData});
     * 
     * You can register multiple GET params.
     * Eg:
     *  MoreGets/{getParam1}/{getParam2}/{getParam3}
     *  TestController->MoreGets({getParam1}, {getParam2}, {getParam3});
     * 
     * The GET parameters always be the last.
     * Eg:
     *  GetAndPost/{getParam1}/{getParam2}/{getParam3})
     *  TestController->GetAndPost({postData}, {getParam1}, {getParam2}, {getParam3});
     * 
     * You can register optional GET parameters by adding @
     * Eg:
     *  Route
     *   OptionalGet/{@optionalParam}
     *  Case 1 (optionalParameter is not empty)
     *   TestController->OptionalGet({optionalParam})
     *  Case 2 (optionalParameter is empty)
     *   TestController->OptionalGet(null)
     * 
     * If a GET parameter is not optional, and empty, the route will fail with Exception!
     */

     
    Wrapper::RegisterRoute(RequestType::GET, "/Test/Get/{id}", "TestController", "GetTest");
    Wrapper::RegisterRoute(RequestType::POST, "/Test/Create", "TestController", "CreateTest");
    Wrapper::RegisterRoute(RequestType::POST, "/Test/Update/{id}", "TestController", "UpdateTest");
    Wrapper::RegisterRoute(RequestType::DELETE, "/Test/Delete/{id}", "TestController", "DeleteTest");
}

?>