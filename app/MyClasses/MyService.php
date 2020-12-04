<?php
namespace App\MyClasses;

class MyService
{
    private  $id = -1;
    private $msg = 'IDはないよ';
    private  $data = ['こんにちは','ようこそ','さようなら'];

    public function __construct()
    {
        if ($id >= 0)
        {
            $this->id = $id;
            $this->msg = 'select: ' . $this->data[$id];
        }
    }

    public function say()
    {
        return $this->msg;
    }

    public function data(int $id)
    {
        return $this->data[$id];
    }

    public function alldata()
    {
        return $this->data;
    }
}
