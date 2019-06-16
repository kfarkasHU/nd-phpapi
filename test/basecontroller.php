<?php

class BaseController {
    public function Json($data) {
        $res = json_encode($data);
        echo "<pre>Controller result:<br />$res </pre>";
    }
}

?>
