<?php
namespace App\MyClasses;

class MyService
{
    private $msg;
    private  $data;

    public function __construct()
    {
        $this->msg = 'これはMyServiceだよ';
        $this->data = ['こんにちは','ようこそ','さよなら'];
    }

    public function say()
    {
        return $this->msg;
    }

    public function data()
    {
        return $this->data;
    }
}
