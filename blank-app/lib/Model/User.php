<?php
class Model_User extends SQL_Model {
    public $table = 'user';
    public $title_field = 'username';

    function init(){
        parent::init();

        $this->addField('username');
        $this->addField('password')->type('password');

        $this->add('dynamic_model/Controller_AutoCreator');
    }


}
