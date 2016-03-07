<?php

class Admin extends App_Admin {

    function init() {

        $this->dbConnect();
        $this->auth = $this->add('Auth');
        $this->auth->setModel('User','username');

        parent::init();



        $this->api->menu->addItem('Twitter', '/');
        $this->api->menu->addItem('My Tweets', 'my');
        $this->api->menu->addItem('Admin', 'admin');
    }
}
