<?php

namespace App\Repositories;

use App\Models\Paste;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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

    /**
     * @return void
     * @throws \Exception
     */
    public static function deleteByExpiration (){

        $currentTime = new \DateTimeImmutable(date('Y-m-d H:i'));
        $pastesToDelete = Paste::where('delete_time', '<=', $currentTime)->get();
        foreach ($pastesToDelete as $paste){
            $paste->delete();
        }

    }

    /**
     * @return Paste[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll(){

        return Paste::all();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getLatestPublicPastes(): \Illuminate\Support\Collection
    {

        return DB::table('pastes')->where('access_type','public')->orderByDesc('created_at')->limit('10')->get();

    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getUserLatestPastes() : \Illuminate\Support\Collection
    {
        if (auth()->user() !== null){
            return DB::table('pastes')->where('user_id', auth()->user()->id)->orderByDesc('created_at')->limit('10')->get();
        }  else return \Illuminate\Support\Collection::empty();

    }

}
