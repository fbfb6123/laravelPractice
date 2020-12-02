<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class HelloController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $msg = '';
        $keys = [];
        $values = [];

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

    public function other($msg) {
        Storage::disk('public')->prepend($this->fname, $msg);
        return redirect()->route('hello');
    }
}
