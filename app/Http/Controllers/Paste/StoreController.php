<?php

namespace App\Http\Controllers\Paste;

use App\Http\Controllers\Controller;
use App\Http\Requests\Paste\StoreRequest;
use App\Models\Paste;
use App\Repositories\PasteRepository;
use App\Services\Paste\Service;


class StoreController extends BaseController
{

    /**
     * @return \Illuminate\Http\RedirectResponse
     */

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data = $this->service->setDeleteTime($data);
        $data['url_selector'] = $this->service->urlGenerate();
        $data['user_id'] = $this->service->getUserId();
        $paste = $this->pasteRepository->createPaste($data);


        return redirect()->route('paste.show', $paste->url_selector);

    }
}
