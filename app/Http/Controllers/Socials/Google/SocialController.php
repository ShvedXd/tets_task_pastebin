<?php

namespace App\Http\Controllers\Socials\Google;

use App\Http\Controllers\Controller;
use App\Repositories\SocialRepository;
use App\Services\Social\SocialService;
use Illuminate\Http\Request;
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

    public function __construct(SocialService $service, SocialRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;

    }

    public function index()
    {
        return Socialite::driver('google')->redirect();

    }

    public function callback(): \Illuminate\Http\RedirectResponse
    {


        $user = Socialite::driver('google')->user();


        $data = $this->service->saveSocialData($user);

        $user = $this->repository->createOrUpdateSocial($data);

        if ($user) {

            Auth::login($user);
            return redirect()->route('home');
        }

        return back();



    }
}
