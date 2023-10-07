<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface Irepository {

    public function create(array $data);
    public function getAll(): Model;


}
