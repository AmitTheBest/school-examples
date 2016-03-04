<?php
class Model_User extends SQL_Model {
    public $table = 'user';
    public $title_field = 'username';

    function init(){
        parent::init();

        $this->addField('username');
        $this->addField('password')->type('password');

        $this->addField('is_admin')->type('boolean');
        $this->addField('gender')->enum(['M','F']);

        $this->hasMany('Tweet');
        $this->hasMany('Follow','owner_id',null,'Following');
        $this->hasMany('Follow',null,      null,'Followers');

        $this->addExpression('tweets')->set(function($m){
            return $m->refSQL('Tweet')->count();
        });

        $this->addExpression('following')->set(function($m){
            return $m->refSQL('Following')->count();
        });

        $this->addExpression('followers')->set(function($m){
            return $m->refSQL('Followers')->count();
        });

        $this->add('dynamic_model/Controller_AutoCreator');
    }


}
