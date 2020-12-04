<?php

namespace App\Http\Controllers;

use App\MyClasses\MyService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    public function index(int $id = -1)
    {
        $myService = app()->makewith('App\MyClasses\MyService',['id'=>$id]);
            $data =[

                'msg'=>$myService->say($id),
                'data' => $myService->alldata(),
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
