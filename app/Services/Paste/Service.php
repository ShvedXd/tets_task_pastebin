<?php

namespace App\Services\Paste;

use App\Models\Paste;
use DateTimeImmutable;


class Service
{


    /**
     * @param array $data
     * @return array
     * @throws \Exception
     */

    public function setDeleteTime(string $data): DateTimeImmutable
    {
        $currentTime = new \DateTimeImmutable(date('Y-m-d H:i:s'));
        $time = $data;
        $data = $currentTime->modify("+$time");

        return $data;

    }

    /**
     * @return string
     * @throws \Exception
     */

    public function urlGenerate(): string
    {
        $str = base64_encode(random_bytes(9));
        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] == '/') {

                $str[$i] = 'a';
            }

        }
        return $str;
    }

    /**
     * @return int
     */
    public function getUserId($user): int
    {

        if ($user !== null) {
            return $user->id;

        } else return  0;


    }

    /**
     * @param Paste $paste
     * @return bool
     * @throws \Exception
     */
    public function isExposure(Paste $paste): bool
    {
        $currentTime = date('Y-m-d H:i');

        if ($paste->delete_time <= $currentTime ) {
            return true;
        } else {

            return false;
        }

    }

}
