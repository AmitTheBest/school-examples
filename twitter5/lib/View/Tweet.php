<?php

class View_Tweet extends View {

    public $like_button;
    protected $like_button_class = 'Button';

    function init(){
        parent::init();

        $this->like_button = $this->add($this->like_button_class,null,'Button');
        $this->like_button->set(['Like','icon'=>'heart']);

    }

    function setModel(Model_Tweet $m){

        parent::setModel($m);

        $js_reload = $this->js()->reload();
        $this->like_button->on('click', function()use($js_reload){
            $this->model->like();
            return $js_reload;
        });

        //$this->model->like();
        return $this->model;
    }

    function modelRender(){
        parent::modelRender();
        $this->template['date'] = date('d/m/Y',strtotime($this->model['date']));
        //$this->template['random'] = rand(1,100);
    }

    function defaultTemplate(){
        return ['view/tweet'];
    }

}