<?php

class page_index extends Page {

    public $title='Dashboard';

    function init() {
        parent::init();

        // $g = $this->add('Grid');
        // $g->setModel('Tweet')->setOrder('date desc')->setLimit(20);
        // $g->addFormatter('user','link',['id_value'=>'user_id']);
        // $g->addFormatter('message','link',['page'=>'tweet']);


        $l = $this->add('View_TweetFeed');
        $l->setModel('Tweet');
    }
}
