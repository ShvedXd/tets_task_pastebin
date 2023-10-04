<?php

namespace App\Http\Controllers\Paste;

use App\Http\Controllers\Controller;
use App\Models\Paste;
use App\Repositories\PasteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends BaseController
{

    /**
     * @param string $pasteHash
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function __invoke(string $pasteHash)
    {
       $paste = $this->pasteRepository->findByHash($pasteHash);
       $latestPastes = $this->pasteRepository->getLatestPublicPastes();




        return view('paste.show', compact('paste', 'latestPastes'));

    }
}
