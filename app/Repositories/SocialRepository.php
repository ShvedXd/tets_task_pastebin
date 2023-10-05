<?php

namespace App\Repositories;



use App\Models\User;

class SocialRepository
{

    /**
     * @param array $data
     * @return mixed
     */
    public function createOrUpdateSocial (array $data): User{

        $user = User::where('email', $data['email'])->first();

        if ($user) {
            $user->update(['name'=>$data['name']]);
            return $user;
        }
       return User::create($data);
    }

}
