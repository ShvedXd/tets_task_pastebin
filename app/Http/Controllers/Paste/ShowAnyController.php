<?php

namespace App\Http\Controllers\Paste;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowAnyController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
 public function __invoke()
 {
     $this->authorize('view', auth()->user());
     $pastes = $this->pasteRepository->getUserAllPaginatePastes(auth()->user(), 5);
     $latestPastes = $this->pasteRepository->getLatestPublicPastes();

     $latestUserPastes = $this->pasteRepository->getUserLatestPastes(auth()->id());
     return view('paste.showAny', compact('pastes','latestPastes', 'latestUserPastes'));
 }

}
