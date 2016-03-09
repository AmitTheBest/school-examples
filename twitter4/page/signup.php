<?php

class page_signup extends Page {

    public $title='Signup';

    function init() {
        parent::init();

        $f = $this->add('Form');
        $f->setModel('User', ['username','password','gender']);

        $f->getElement('username')->validate(function($v,$a)use($f){
            $m = $f->model->newInstance()->tryLoadBy('username',$a);
            if ($m->loaded()) {
                return $v->fail('already exists');
            }
            return $a;
        });


        $f->validate('password|required|len|>=3');

        $f->addField('Password','confirm_password')
            ->validate('eqf?Passwords do not match|password')
            ;

        $f->addSubmit();

        $f->add('Order')->move('gender','last')->now();

        $f->onSubmit(function($f){

            $f->save();

            return 'Welcome to our twitter app';

        });


    }
}
