<?php

class page_admin extends Page {

    public $title='Twitter';

    function init(){
        parent::init();

        //$this->app->auth->check();

        // Instead of using global auth we can define auth here. Separate
        // log-in. When logging out destrroys both sessions. Thry this code
        // $a = $this->add('Auth');
        // $a->setModel('Admin','username');
        // $a->check();

        // The above code would make sense if Admin wouldn't be based on user.
        // but in our situation it's simpler to verify is_admin flag
        // if(!$this->app->auth->model['is_admin']){
        //     $this->add('View_Error')->set('You must be admin');
        //     return;
        // }


        $this->add('CRUD')->addClass('atk-push')->setModel('Tweet');
        $this->add('CRUD')->addClass('atk-push')->setModel('User');
        $this->add('CRUD')->addClass('atk-push')->setModel('Follow');
    }
}

