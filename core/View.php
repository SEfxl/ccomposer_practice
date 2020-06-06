<?php

namespace core;


class View
{
    //模板文件
    protected $file;

    //模板变量
    protected $vars = [];

    //读取文件
    public function make($file)
    {
        $this->file = 'view/' . $file . '.html';

        return $this;
    }

    //分配变量
    public function with($name, $value)
    {
        $this->vars[$name] = $value;

        return $this;
    }

    //魔术方法加载模板
    public function __toString()
    {
        extract($this->vars); //将变量从数组中导入到当前的符号表中
        include $this->file;

        return '';
    }

}