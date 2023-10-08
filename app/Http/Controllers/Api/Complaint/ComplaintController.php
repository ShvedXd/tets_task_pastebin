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
    public function index() : \Illuminate\Http\Resources\Json\AnonymousResourceCollection
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






}
