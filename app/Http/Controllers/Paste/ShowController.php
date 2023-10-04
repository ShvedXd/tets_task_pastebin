<?php

namespace App\Http\Controllers\Paste;

use App\Http\Controllers\Controller;
use App\Repositories\PasteRepository;
use Illuminate\Http\Request;

class ShowController extends BaseController
{



    public function __invoke(string $pasteHash)
    {
       $paste = $this->pasteRepository->findByHash($pasteHash);



        return view('paste.show', compact('paste'));

    }
}
