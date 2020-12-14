<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StbController extends Controller
{
    public function index($id = -1)
    {
        if ($id >= 0)
        {
            $msg = 'get ID <= ' . $id;
            $result = DB::table('people')->where('name','like','%'.$id . '%')->get();
        }
        else
        {
            $msg = 'get people records';
            $result = DB::table('people')->get();
        }
        $data = [
            'msg' =>$msg,
            'data' => $result,
        ];

        return view('hello2.index', $data);
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
