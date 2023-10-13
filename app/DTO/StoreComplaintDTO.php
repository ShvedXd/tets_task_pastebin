<?php

namespace App\DTO;

use App\Http\Requests\Complaint\StoreRequest;
use Spatie\DataTransferObject\DataTransferObject;

class StoreComplaintDTO extends DataTransferObject
{
    public int $user_id = 0;
    public int $paste_id = 0;
    public string $reason;


    public static function fromRequest (StoreRequest $request): self
    {

        return new self($request->validated());

    }

}
