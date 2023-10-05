<?php

namespace App\Http\Controllers\Paste;

use App\Http\Controllers\Controller;
use App\Models\Paste;
use App\Repositories\PasteRepository;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends BaseController
{

    /**
     * @param string $pasteHash
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function __invoke(string $pasteHash)
    {

       $latestPastes = $this->pasteRepository->getLatestPublicPastes();
        $paste = $this->pasteRepository->findByHash($pasteHash);

        $this->authorize('showPaste',[self::class, $paste]);



        return view('paste.show', compact('paste', 'latestPastes'));

    }
}
