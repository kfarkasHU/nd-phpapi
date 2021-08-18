<?php
class TestController {
    public function testGetFn() {
        echo "testGetFn";
    }
    public function testGetFnWithArg($paramArg) {
        echo "testGetFnWithArg() > paramArg = $paramArg";
    }
    public function testDeleteFn() {

    }
    public function testDeleteFnWithArg($paramArg) {

    }
    public function testPutFnWithBodyArg($bodyArg) {

    }
    public function testPostFnWithParamArg($paramArg) {

    }
    public function testPostFnWithBodyArg($bodyArg) {

    }
    public function testPostFnWithBothArgs($paramArg, $bodyArg) {

    }
    public function testPatchFn($bodyArg) {

    }
}
?>
