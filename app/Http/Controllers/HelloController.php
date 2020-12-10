<?php

namespace App\Http\Controllers;

use App\MyClasses\MyService;
use App\MyClasses\MyServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{

    public function index(MyServiceInterface $myservice, int $id = -1)
    {
        $myservice->setId($id);
            $data =[
                'msg'=>$myservice->say(),
                'data' => $myservice->alldata(),
            ];

        return view('hello.index',$data);
    }

    public function other() {
        $data =[
            'name'=>'池田',
            'mail' => 'ikeda@ikeda',
            'tel' => '090-099-099',
        ];
        $query_str = http_build_query($data);
        $data['msg'] = $query_str;
        return redirect()->route('hello',$data);
    }
}
