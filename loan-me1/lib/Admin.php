<?php

class Admin extends App_Admin {

    function init() {
        parent::init();
        $this->dbConnect();

        $this->auth = $this->add('Auth');
        $this->auth->setModel('User');
        $this->auth->check();

        $this->api->menu->addItem('Dashboard', '/');
        $this->api->menu->addItem('Contacts', 'contact');
    }
}
