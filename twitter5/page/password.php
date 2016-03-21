<?php

class page_password extends Page {

    public $title='Change Password';

    function init() {
        parent::init();

        $this->app->auth->check();

        $f = $this->add('Form');





        $f->addField('Password','old_password')
            ->validate('required')
            ->validate(function($v,$a){
                $username = $this->app->auth->model['username'];
                if ($this->app->auth->verifyCredentials($username,$a)) {
                    return $a;
                } else {
                    return $v->fail('is incorrect');
                }
            });

        $f->addField('Password','new_password')
            ->validate('required|len|>=3');

        $f->addField('Password','new_password2')
            ->validate('eqf?Passwords do not match|new_password')
            ;

        $f->addSubmit();

        $f->onSubmit(function($f){

            // $username = $this->app->auth->model['username'];
            // if ($this->app->auth->verifyCredentials($username,$f['old_password'])) {
            //     return 'Your password has been changed';
            // } else {
            //     return $f->error('old_password', 'Wrong password');
            // }

            $this->app->auth->model['password'] = $f['new_password'];
            $this->app->auth->model->save();
            return 'Your password has been changed';

        });


    }
}
