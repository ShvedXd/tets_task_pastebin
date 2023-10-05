<?php

namespace App\Repositories;



use App\Models\User;

class SocialRepository
{

    public function createOrUpdateSocial (array $data){

        $user = User::where('email', $data['email'])->first();

        if ($user) {
            $user->update(['name'=>$data['name']]);
            return $user;
        }
       return User::create($data);
    }

}
