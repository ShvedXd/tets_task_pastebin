<?php

namespace App\Services\Social;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialService
{

    public function saveSocialData(\Laravel\Socialite\Contracts\User $user) : array
    {
        $email = $user->getEmail();
        $name = $user->getName();
        $password = Hash::make('1234456678');


        $data = ['email' => $email,
            'password' => $password,
            'name' => $name,

        ];

        return $data;

     }


}
