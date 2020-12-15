<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StbController extends Controller
{
    public function index()
    {

        $data = ['msg'=>'','data'=>[]];
        $msg = 'get: ';
        $result = [];
        DB::table('people')->orderBy('name','asc')
            ->chunk(1, function($items) use (&$msg, &$result)
        {
            foreach ($items as $item)
            {
                $msg .=$item->id . ':' .$item->name .' ';
                $result += array_merge($result, [$item]);
                break;
            }
            return true;
        });
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
