<?php
namespace App\MyClasses;

class PowerMyService implements MyServiceInterface
{
    private $id = -1;
    private $msg = 'np id...';
    private $data =['いちご','リンゴ','バナナ','みかん','ぶどう','メロン'];

    public function __construct()
    {
        $this->setId(rand(0, count($this->data)));
    }
}
