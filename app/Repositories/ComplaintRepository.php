<?php

namespace App\Repositories;

use App\Models\Complaint;

class ComplaintRepository
{


    public function createComplaint(array $data)
    {

        Complaint::create($data);

    }
}
