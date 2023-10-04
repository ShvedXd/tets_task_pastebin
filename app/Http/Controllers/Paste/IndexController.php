<?php

namespace App\Http\Controllers\Paste;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends BaseController
{

    public function __invoke()
    {
         $LANGS = [
        'php',
        'java',
        'python',
        'c',
        'c++',
        'html',
        'css',

    ];
        return view('paste.index', compact('LANGS'));
    }
}
