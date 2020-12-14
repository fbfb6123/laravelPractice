<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StbController extends Controller
{
    public function index()
    {

        $msg = 'get people records.';
        $first = DB::table('people')->first();
        $last = DB::table('people')->orderBy('id','desc')->first();
        $result = [$first,$last];
        
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
