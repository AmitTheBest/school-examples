<?php

class page_admin extends Page {

    public $title='Twitter';

    function init(){
        parent::init();

        $this->app->auth->check();

        $this->add('CRUD')->addClass('atk-push')->setModel('Tweet');
        $this->add('CRUD')->addClass('atk-push')->setModel('User');
        $this->add('CRUD')->addClass('atk-push')->setModel('Follow');
    }
}

