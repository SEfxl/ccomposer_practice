<?php

namespace core;


class View
{
    //ģ���ļ�
    protected $file;

    //ģ�����
    protected $vars = [];

    //��ȡ�ļ�
    public function make($file)
    {
        $this->file = 'view/' . $file . '.html';

        return $this;
    }

    //�������
    public function with($name, $value)
    {
        $this->vars[$name] = $value;

        return $this;
    }

    //ħ����������ģ��
    public function __toString()
    {
        extract($this->vars); //�������������е��뵽��ǰ�ķ��ű���
        include $this->file;

        return '';
    }

}