<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\SocialRepository;
use App\Services\Social\SocialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

    /**
     * @var SocialService
     */
    private $service;
    /**
     * @var SocialRepository
     */
    private $repository;

    public function __construct(SocialService $service, SocialRepository  $repository)
    {
        $this->service = $service;
        $this->repository = $repository;

    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function index()
    {
        return Socialite::driver('vkontakte')->redirect();

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback(): \Illuminate\Http\RedirectResponse
    {

        $user = Socialite::driver('vkontakte')->user();

        $data = $this->service->saveSocialData($user);

        $user = $this->repository->createOrUpdateSocial($data);

        if ($user) {

            Auth::login($user);
            return redirect()->route('home');
        }

        return back();



    }
}
