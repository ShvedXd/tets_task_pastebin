<?php

namespace App\Http\Controllers\Paste;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowAnyController extends BaseController
{

 public function __invoke()
 {
     $this->authorize('view', auth()->user());
     $pastes = $this->pasteRepository->getUserAllPaginatePastes(auth()->user());

     return view('paste.showAny', compact('pastes'));
 }

}
