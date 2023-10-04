<?php

namespace App\Repositories;

use App\Models\Paste;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class PasteRepository
{

    /**
     * @return Paste
     * @var array $data
     */

    public function createPaste(array $data) : Paste
    {

         return   Paste::create($data);


    }


    /**
     * @param string $pasteHash
     * @return Paste
     */
    public function findByHash (string $pasteHash) : Paste
    {
        $paste = Paste::where('url_selector', $pasteHash)->firstOrFail();



        return $paste;
    }

}
