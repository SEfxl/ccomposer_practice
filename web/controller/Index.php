<?php

namespace web\controller;

use core\View;
use Gregwar\Captcha\CaptchaBuilder;

class Index
{

    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function show()
    {
        return $this->view->make('index')->with('version', '1.0');
    }

    public function login()
    {
        //dd($_SESSION); //检测是否设置session
        return $this->view->make('login');
    }

    public function code()
    {
        header('Content-type: image/jpeg');

        $builder = new CaptchaBuilder;
        $builder->build(100,30);
        $_SESSION['phrase'] = $builder->getPhrase();
        $builder->output();
    }

}