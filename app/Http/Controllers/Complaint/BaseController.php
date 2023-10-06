<?php

namespace App\Http\Controllers\Complaint;

use App\Http\Controllers\Controller;
use App\Repositories\ComplaintRepository;

class BaseController extends Controller
{


    /**
     * @var ComplaintRepository
     */
    protected $repository;

    public function __construct(ComplaintRepository $repository)
    {
        $this->repository = $repository;

    }

}
