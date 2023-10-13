<?php

namespace App\Http\Controllers\Complaint;


use App\DTO\StoreComplaintDTO;
use App\Http\Requests\Complaint\StoreRequest;
use Illuminate\Http\Request;

class StoreController extends BaseController
{

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(StoreRequest $request)
    {
        $dto = StoreComplaintDTO::fromRequest($request);
        $url_selector = $request->get('url_selector');
        $this->repository->create($dto->toArray());

        return redirect()->route('paste.show',$url_selector);
    }
}
