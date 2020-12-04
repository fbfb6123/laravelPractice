<?php
namespace App\MyClasses;

class MyService
{
    private  $id = -1;
    private $msg = 'IDはないよ';
    private  $data = ['こんにちは','ようこそ','さようなら'];

    public function __construct(int $id = -1)
    {
    }

    public function setId($id)
    {
        $this->id = $id;
        if ($id >= 0 && $id < count($this->data))
        {
            $this->msg = 'select id:' .$id
                . ',data:"' . $this->data[$id] .'"';
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
