<?php
class Model_Tweet extends SQL_Model {
    public $table = 'tweet';

    function init(){
        parent::init();

        $this->addField('message')->type('text');
        $this->addField('date')->type('date');

        $this->addField('is_flagged')->type('boolean');
        $this->addCondition('is_flagged', null);

        $this->hasOne('User');

        $this->addExpression('followers')
        ->set(function($m){
            return $m->refSQL('user_id')
            ->sum('followers');
        });

        $this->add('dynamic_model/Controller_AutoCreator');
    }

}