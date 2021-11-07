<?php
use System\engine\Controller;
use System\library\OC_CLI;

class ControllerOcCliStartup extends Controller {
    public function index() {
        $this->attach_libraries();
    }

    private function attach_libraries() {
        $this->registry->set('oc_cli', new OC_CLI($this->registry));
    }
}
