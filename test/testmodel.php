<?php

class TestModel {
    public function __construct($data, $request) {
        $this->data = $data;
        $this->request = $request;
    }

    public $data;
    public $request;
}

?>