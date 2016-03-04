<?php

class page_my extends Page {

    public $title='Tweets for ';

    function init() {
        parent::init();

        $this->app->auth->check();

        $this->title.=$this->app->auth->model['username'];


        $g = $this->add('Grid');
        $g->setModel($this->app->auth->model->ref('Tweet'))
            ->setOrder('date desc')->setLimit(20);

        $g->addClass('atk-push');

        $f = $this->add('Form');
        $f->setModel($this->app->auth->model->ref('Tweet'));
        $f->addSubmit();
        $f->onSubmit(function($f){
            $f->save();
            return "Tweeted successfully";
        });



    }
}
