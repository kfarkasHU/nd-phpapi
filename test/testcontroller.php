<?php

require_once("basecontroller.php");
require_once("testmodel.php");

class TestController extends BaseController {
    public function GetTest($id) {
        $result =  new TestModel($id, "GET");

        return parent::Json($result);
    }

    public function UpdateTest($data, $id) {
        $data->id = $id;
        $result =  new TestModel($data, "POST/UPDATE");

        return parent::Json($result);
    }

    public function CreateTest($data) {
        $result =  new TestModel($data, "POST/CREATE");

        return parent::Json($result);
    }

    public function DeleteTest($id) {
        $result =  new TestModel($id, "DELETE");

        return parent::Json($result);
    }
}

?>
