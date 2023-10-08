<?php

namespace App\Repositories;

use App\Models\Complaint;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class ComplaintRepository implements Irepository
{

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {

        return Complaint::create($data);

    }



    public function getAll(): Collection
    {
        return Complaint::all();
    }
}
