<?php

namespace App\Repositories;

use App\Models\User;


class UserRepository implements Irepository
{

    /**
     * @param $id
     * @return User
     */
    public function getUserById($id) : User {

        return User::find($id);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function isBanned(User $user) : bool
    {

        if ($user->is_banned) {
            return true;
        }
        return false;


    }

    /**
     * @param User $user
     * @param bool $value
     * @return void
     */
    public function setBanned(User $user, bool $value){
        if ($value){
            $user->update(['is_banned'=>false]);
        } else  $user->update(['is_banned' => true] );

    }

    /**
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
       return  User::createOrUpdate($data);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getAll() : \Illuminate\Database\Eloquent\Model
    {

        return User::all();
    }
}
