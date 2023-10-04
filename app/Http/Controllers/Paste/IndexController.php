<?php

namespace App\Http\Controllers\Paste;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        return view('paste.index');
    }
}
