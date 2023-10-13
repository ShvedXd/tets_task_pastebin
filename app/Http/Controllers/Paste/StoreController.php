<?php

namespace App\Http\Controllers\Paste;

use App\DTO\StorePasteDTO;
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
        $dto = StorePasteDTO::fromRequest($request);
        $dto->delete_time = $this->service->setDeleteTime($dto->delete_time);
        $dto->user_id = $this->service->getUserId(auth()->user());
        $dto->url_selector = $this->service->urlGenerate();

        $this->authorize('storePrivate',[self::class,$dto->access_type]);

        $paste = $this->pasteRepository->create($dto->toArray());


        return redirect()->route('paste.show', $paste->url_selector);

    }
}
