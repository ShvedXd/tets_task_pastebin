<?php

namespace App\Http\Controllers\Complaint;


use App\Http\Requests\Complaint\StoreRequest;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $url_selector = $data['url_selector'];
        unset($data['url_selector']);
        $this->repository->createComplaint($data);

        return redirect()->route('paste.show',$url_selector);
    }
}
