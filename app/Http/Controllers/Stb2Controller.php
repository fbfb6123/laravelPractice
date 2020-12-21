<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;


class Stb2Controller extends Controller
{
    public function index(Request $request)
    {
        $msg = 'peopleテーブル';

        $keys = Person::get()->modelKeys();

        $even = array_filter($keys, function ($key)
        {
            return $key % 2 == 0;
        });

        $result = Person::get()->only($even);

        $data = [
            'msg' =>$msg,
            'data' =>$result,
        ];

        return view('hello3.index', $data);
    }
}
