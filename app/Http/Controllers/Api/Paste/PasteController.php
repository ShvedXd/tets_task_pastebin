<?php

namespace App\Http\Controllers\Api\Paste;

use App\Http\Controllers\Controller;
use App\Http\Requests\Paste\StoreRequest;
use App\Http\Resources\Paste\PasteResource;
use App\Models\Paste;
use App\Repositories\PasteRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PasteController extends Controller
{
    /**
     * @var PasteRepository
     */
    private $repository;

    public function __construct(PasteRepository $repository)
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
        return PasteResource::collection($this->repository->getLatestPublicPastes());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $paste = $this->repository->create($request->validated());
        return new PasteResource($paste);
    }

    /**
     * Display the specified resource.
     *
     * @param string $pasteHash
     * @return PasteResource
     */
    public function show(string $pasteHash)
    {


        return new PasteResource($this->repository->findByHash($pasteHash));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paste $paste)
    {
        $paste->delete();

        return \response(null, ResponseAlias::HTTP_NO_CONTENT);

    }
}
