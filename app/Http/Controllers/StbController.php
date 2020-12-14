<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StbController extends Controller
{
    public function index($id = -1)
    {
        if ($id >= 0)
        {
            $msg = 'get name like "' .$id . '".';
            $result = [DB::table('people')->find($id)];
            Log::info($result);
            //ログ($result)の中身 ２次元配列
            /*local.INFO: array (
            0 =>
                (object) array(
                    'id' => 3,
                    'name' => '永田',
                    'email' => 'zoo@zoo',
                    'age' => 28,
                    'created_at' => '2020-12-14 09:51:00',
                    'updated_at' => '2020-12-14 09:51:01',
                ),
        )  */
        }
        else
        {
            $msg = 'get people records.';
            $result = DB::table('people')->get();
        }

        $data = [
            'msg' =>$msg,
            'data' => $result,
        ];
        Log::debug($data);
        //ログ($data)の中身　　三次元配列
        /*local.DEBUG: array (
        'msg' => 'get name like "3".',
        'data' =>
            array (
                0 =>
                    (object) array(
                        'id' => 3,
                        'name' => '永田',
                        'email' => 'zoo@zoo',
                        'age' => 28,
                        'created_at' => '2020-12-14 09:51:00',
                        'updated_at' => '2020-12-14 09:51:01',
                    ),
            ),*/

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
