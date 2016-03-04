<?php

class page_twitter extends Page {

    public $title='Twitter';

    function init(){
        parent::init();

        $this->add('CRUD')->addClass('atk-push')->setModel('Tweet');
        $this->add('CRUD')->addClass('atk-push')->setModel('User');
        $this->add('CRUD')->addClass('atk-push')->setModel('Follow');
    }
}

