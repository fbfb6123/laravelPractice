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

    public function setId($id)
    {
        if ($id >=0 && $id < count($this->data))
        {
            $this->id = $id;
            $this->msg = "あなたがすきなのは". $id
                . "番の" .$this->data[$id] . "ですね";
        }
    }
    
}
