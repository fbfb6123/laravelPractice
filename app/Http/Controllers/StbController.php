<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StbController extends Controller
{
    public function index($id)
    {

        $msg = 'show page: ' .$id
        $result = DB::table('people')->paginate(3, ['*'], 'page', $id);
        
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
