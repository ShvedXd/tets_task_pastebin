<?php

namespace App\Http\Controllers\Api\Complaint;

use App\Http\Controllers\Complaint\StoreController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Paste\StoreRequest;
use App\Http\Resources\Complaint\ComplaintResource;
use App\Models\Complaint;
use App\Repositories\ComplaintRepository;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{

    /**
     * @var ComplaintRepository
     */
    private $repository;

    public function __construct(ComplaintRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ComplaintResource::collection($this->repository->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ComplaintResource
     */
    public function store(\App\Http\Requests\Complaint\StoreRequest $request): ComplaintResource
    {

        $data = $request->validated();
        unset($data['url_selector']);

        $complaint = $this->repository->create($data);

        return new ComplaintResource($complaint);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
