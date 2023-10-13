<?php

namespace App\Http\Controllers\Paste;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends BaseController
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

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
        $latestPastes = $this->pasteRepository->getLatestPublicPastes();

        $latestUserPastes = $this->pasteRepository->getUserLatestPastes(auth()->id());
        return view('paste.index', compact('LANGS', 'latestPastes','latestUserPastes'));
    }


}
