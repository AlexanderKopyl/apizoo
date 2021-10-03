<?php
use System\engine\Controller;
class ControllerOcCliStartup extends Controller {
    public function index() {
        $this->attach_libraries();
    }

    private function attach_libraries() {
        $this->registry->set('user', new Cart\User($this->registry));
        $this->registry->set('oc_cli', new OC_CLI($this->registry));
    }
}
