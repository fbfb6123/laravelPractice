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
        $modified = Storage::disk('public')
            ->lastModified($this->fname);
        $modified_time = data('y-m-d H:i:s', $modified);
        $sample_keys = ['url', 'size', 'modified'];
        $sample_meta = [$url, $size, $modified];
        $result = '<table><tr><th>' .implode('</th></tr>', $sample_keys) . '</th></tr>';
        $result .= '<tr><td>' .implode('<td></td>', $sample_meta) . '</td></tr></table>';


        return view('hello.index', $data);
    }

    public function other($msg) {
        Storage::disk('public')->prepend($this->fname, $msg);
        return redirect()->route('hello');
    }
}
