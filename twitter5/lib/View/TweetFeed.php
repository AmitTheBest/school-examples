<?php

class View_TweetFeed extends CompleteLister {

    //public $like_button;
    //protected $like_button_class = 'Button';

    // function init(){
    //     parent::init();

    //     $this->like_button = $this->add($this->like_button_class,null,'Button');
    //     $this->like_button->set(['Like','icon'=>'heart']);

    // }

    function setModel($m){

        parent::setModel($m);

        $js_reload = $this->js()->reload();
        $this->on('click', '.do-like', function($j,$args)use($js_reload){
            $this->model->load($args['id']);
            $this->model->like();
            return $js_reload;
        });

        return $this->model;
    }

     function formatRow(){
         parent::formatRow();
         $this['date'] = date('d/m/Y',strtotime($this->model['date']));
         $this['tweet_url'] = $this->app->url('tweet', ['id'=>$this->current_id]);
         $this['user_url'] = $this->app->url('user', ['id'=>$this->model['user_id']]);
         //$this->template['random'] = rand(1,100);
     }

    function defaultTemplate(){
        return ['view/tweetfeed'];
    }

}