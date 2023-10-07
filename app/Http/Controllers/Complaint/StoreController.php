<?php

namespace App\Http\Controllers\Complaint;


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
        $data = $request->validated();
        $url_selector = $data['url_selector'];
        unset($data['url_selector']);
        $this->repository->create($data);

        return redirect()->route('paste.show',$url_selector);
    }
}
