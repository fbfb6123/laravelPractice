<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;


class Stb2Controller extends Controller
{
    public function index(Request $request)
    {
        $msg = 'peopleテーブル';

        $result = Person::get()->reject(function($person)
        {
            return $person->age <25;
        });

        $data = [
            'msg' =>$msg,
            'data' =>$result,
        ];

        return view('hello3.index', $data);
    }
}
