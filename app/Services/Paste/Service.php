<?php

namespace App\Services\Paste;

use function Illuminate\Events\queueable;

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
