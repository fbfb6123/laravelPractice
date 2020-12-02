<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class HelloController extends Controller
{
    public function index(Request $request, Response $response)
    {

            $name = $request->query('name');
            $mail = $request->query('mail');
            $tel = $request->query('tel');
            $msg = $name . ', ' . $mail .', ' .$tel;
            $keys = ['名前','メール','電話'];
            $values = [$name, $mail, $tel];
            $data =[
                'msg'=>$msg,
                'keys' => $keys,
                'values' => $values,
            ];
            $request->flash();
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
