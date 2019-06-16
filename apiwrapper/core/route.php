<?php

class Route {
    public function __construct($requestType, $urlTemplate, $controllerName, $actionName) {
        $this->RequestType = $requestType;
        $this->UrlTemplate = $urlTemplate;
        $this->Controller = $controllerName;
        $this->Action = $actionName;
    }

    public $RequestType;
    public $UrlTemplate;
    public $Controller;
    public $Action;
}

?>
