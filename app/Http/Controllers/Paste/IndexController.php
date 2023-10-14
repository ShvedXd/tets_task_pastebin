<?php

namespace App\Http\Controllers\Paste;

use App\Enums\AccessTypeEnum;
use App\Enums\LangsEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends BaseController
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function __invoke()
    {



        $latestPastes = $this->pasteRepository->getLatestPublicPastes();
        $langs = LangsEnum::cases();
        $accessTypes = AccessTypeEnum::cases();
        $latestUserPastes = $this->pasteRepository->getUserLatestPastes(auth()->id());
        return view('paste.index', compact( 'latestPastes','latestUserPastes' , 'langs', 'accessTypes' ));
    }


}
