<?php

namespace App\Http\Controllers;

/*use App\MyClasses\MyService;*/
use App\MyClasses\MyServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Facades\MyService;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{

    public function index(Request $request)
    {
        $id = $request->query('page');
        $msg = 'show page: ' .$id;
        $result = DB::table('people')->simplePaginate(3);

        $data = [
            'msg' =>$msg,
            'data' => $result,
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
