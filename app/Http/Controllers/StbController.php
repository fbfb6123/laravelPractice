<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StbController extends Controller
{
    public function index()
    {

        $name = DB::table('people')->pluck('name');
        $value = $name->toArray();
        $msg = implode(', ', $value);
        $result = DB::table('people')->get();
        
        $data = [
            'msg' =>$msg,
            'data' => $result,
        ];
        Log::debug($data);

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
