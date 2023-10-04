<?php

namespace App\Services\Paste;

use function Illuminate\Events\queueable;

class Service
{


    public function setDeleteTime(array $data): array
    {
        $currentTime = new \DateTimeImmutable(date('Y-m-d H:i:s'));
        $time = $data['delete_time'];
        $data['delete_time'] = $currentTime->modify("+$time");

        return $data;

    }



    public function urlGenerate(): string
    {
         $str= base64_encode(random_bytes(9));
        for ($i = 0;$i<strlen($str);$i++){
            if ($str[$i] == '/') {

                $str[$i] = 'a';
            }

        }
        return $str;
    }

    public function getUserId() : int
    {
        $user = auth()->user();
        if ($user !== null) {
            return $user->id;

        } else return 0;


    }

}
