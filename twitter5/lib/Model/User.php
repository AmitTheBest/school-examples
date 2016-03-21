<?php
class Model_User extends SQL_Model {
    public $table = 'user';
    public $title_field = 'username';

    function init(){
        parent::init();

        $this->addField('username');
		$this->addExpression('name')->set('username');
        $this->addField('password')->type('password');


        $this->addField('is_admin')->type('boolean')->defaultValue(false);
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



        $v = $this->add('Controller_Validator');
        $v
          ->is('username|required|[a-z0-9_]?Must contain only lowercase letters')
          ->on('beforeSave');




        $this->add('dynamic_model/Controller_AutoCreator');
    }

    function refFollowingTweets(){
        $follower_ids = $this->ref('Following')->fieldQuery('user_id');
        return $this->add('Model_Tweet')->addCondition('user_id','in',$follower_ids)->debug();

    }


}
