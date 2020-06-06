<?php

namespace core;


class Bootstrap
{
    public static function run()
    {
        session_start();
        self::parseUrl();
    }

    //����URL���ɿ�������������
    public static function parseUrl()
    {

        if (isset($_GET['s'])) {
            //����s�������ɿ���������
            $info = explode('/', $_GET['s']);
            $class = '\web\controller\\' . ucfirst($info[0]);
            $action = $info[1];
        } else {
            //
            $class = "\web\controller\Index";
            $action = "show";
        }

        //д��ע��汾����,����������ʱ�򣬻��Զ�����__toString()����
        echo (new $class)->$action();
    }
}