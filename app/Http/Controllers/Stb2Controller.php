<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;


class Stb2Controller extends Controller
{
    public function index(Request $request)
    {
        $msg = 'peopleテーブル';

        $result = Person::get()->filter(function($person)
        {
            return $person->age < 50;
        });

        $result2 = Person::get()->filter(function ($person)
        {
            return $person->age < 20;
        });

        $result3 = $result->diff($result2);

        $data = [
            'msg' =>$msg,
            'data' =>$result2,
        ];

        return view('hello3.index', $data);
    }
}
