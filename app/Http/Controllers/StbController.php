<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StbController extends Controller
{
    public function index()
    {

        return view('hello2.index');
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
