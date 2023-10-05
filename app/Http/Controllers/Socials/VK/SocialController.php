<?php

namespace App\Http\Controllers\Socials\VK;

use App\Http\Controllers\Controller;
use App\Repositories\SocialRepository;
use App\Services\Social\SocialService;
use Illuminate\Support\Facades\Auth;
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
