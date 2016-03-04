<?php

class Admin extends App_Admin {

    function init() {
        parent::init();
        $this->dbConnect();

        $this->api->menu->addItem('Dashboard', '/');
    }
}
