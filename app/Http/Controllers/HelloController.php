<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HelloController extends Controller
{
    private $fname;

    function __construct() {
        $this->fname = 'hello.txt';
    }
    public function index() {
        $url = Storage::disk('public')->url($this->fname);
        $size = Storage::disk('public')->size($this->fname);
        $modified_time = data('y-m-d H:i:s', $modified);
        return view('hello.index', $data);
    }

    public function other($msg) {
        Storage::disk('public')->prepend($this->fname, $msg);
        return redirect()->route('hello');
    }
}
