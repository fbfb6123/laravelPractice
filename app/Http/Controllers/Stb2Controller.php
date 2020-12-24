<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;


class Stb2Controller extends Controller
{
    public function index(Request $request)
    {
        $msg = 'peopleテーブル';

        $even = Person::get()->filter(function($item)
        {
            return $item->$id % 2 == 0;
        });

        $map = $even->map(function($item, $key)
        {
            return $item->id . ':' . $item->name;
        });

        $data = [
            'msg' =>$msg,
            'data' =>$result,
        ];

        return view('hello3.index', $data);
    }
}
