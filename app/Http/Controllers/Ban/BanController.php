<?php

namespace App\Http\Controllers\Ban;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;


class BanController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;

    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request , int $id)
    {
        $user =$this->repository->getUserById($id);
        $value = $this->repository->isBanned($user);
        $this->repository->setBanned($user, $value);


        return redirect()->back();

    }
}
