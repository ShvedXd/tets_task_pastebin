<?php

namespace App\Http\Controllers\Paste;

use App\Http\Controllers\Controller;
use App\Repositories\PasteRepository;
use App\Services\Paste\Service;
use Illuminate\Http\Request;

class BaseController extends Controller
{

    /**
     * @var PasteRepository
     */
    protected $pasteRepository;
    /**
     * @var Service
     */
    protected $service;
    public function __construct(PasteRepository $pasteRepository,Service $service)
    {
        $this->pasteRepository = $pasteRepository;
        $this->service = $service;

    }
}
