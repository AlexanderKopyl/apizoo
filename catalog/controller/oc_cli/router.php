<?php
use System\engine\Controller;
class ControllerOcCliRouter extends Controller {
    public function index() {
        return $this->oc_cli->router();
    }
}
