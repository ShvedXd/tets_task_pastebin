<?php

namespace App\Repositories;

use App\Models\Complaint;
use Illuminate\Database\Eloquent\Model;


class ComplaintRepository implements Irepository
{


    public function create(array $data)
    {

        Complaint::create($data);

    }



    public function getAll(): Model
    {
        return Complaint::all();
    }
}
