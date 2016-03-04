<?php
class Model_Follow extends SQL_Model {
    public $table = 'follow';

    function init(){
        parent::init();


        $this->hasOne('User','owner_id'); // Stalker
        $this->hasOne('User');            // Target


        $this->add('dynamic_model/Controller_AutoCreator');
    }

}