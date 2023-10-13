<?php

namespace App\DTO;

use App\Http\Requests\Paste\StoreRequest;
use DateTimeImmutable;
use Spatie\DataTransferObject\DataTransferObject;

class StorePasteDTO extends DataTransferObject
{
    public int $user_id = 0;
    public string $title;
    public string $content;
    public string $url_selector = '';
    public string|null $highlight = '';
    public string $access_type;
    public DateTimeImmutable|string $delete_time;


    public static function fromRequest(StoreRequest $request): self
    {

        return new self($request->validated());

    }

}
