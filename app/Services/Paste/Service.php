<?php

namespace App\Services\Paste;

class Service
{


    public function setDeleteTime(array $data): array
    {
        $Currenttime = new \DateTimeImmutable(date('Y-m-d H:i'));
        $time = $data['delete_time'];
        $data['delete_time'] = $Currenttime->modify("+$time");

        return $data;

    }

    public function urlGenerate(): string
    {
        return base64_encode(random_bytes(9));
    }

    public function getUserId() : int
    {
        $user = auth()->user();
        if ($user !== null) {
            return $user->id;

        } else return 0;


    }

}
