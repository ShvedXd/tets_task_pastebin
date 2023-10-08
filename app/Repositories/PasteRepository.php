<?php

namespace App\Repositories;

use App\Models\Paste;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;


class PasteRepository implements Irepository
{


    /**
     * @throws \Exception
     */
    private function getCurrentTime() {
        return new \DateTimeImmutable(date('Y-m-d H:i'));
}

    /**
     * @return Paste
     * @var array $data
     */

    public function create(array $data): Paste
    {

        return Paste::create($data);


    }


    /**
     * @param string $pasteHash
     * @return Paste
     */
    public function findByHash(string $pasteHash): Paste
    {
        $paste = Paste::where('url_selector', $pasteHash)->firstOrFail();


        return $paste;
    }

    /**
     * @return void
     * @throws \Exception
     */


    public static function deleteByExpiration()
    {

        $currentTime = new \DateTimeImmutable(date('Y-m-d H:i'));

            $pastesToDelete = Paste::where('delete_time', '<=', $currentTime)->get();
            foreach ($pastesToDelete as $paste) {
                $paste->delete();

            }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getAll() : Collection
    {

        return Paste::all();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getLatestPublicPastes(): \Illuminate\Support\Collection
    {

        return DB::table('pastes')->where('access_type', 'public')->
        where('delete_time', '>', $this->getCurrentTime())->
        orderByDesc('created_at')->
        limit('10')->get();

    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getUserLatestPastes(): \Illuminate\Support\Collection
    {
        if (auth()->user() !== null) {


            return auth()->user()->getUserPastes()->where('delete_time', '>', $this->getCurrentTime())->
            orderByDesc('created_at')->
            limit('10')->get();
        } else return \Illuminate\Support\Collection::empty();

    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @throws \Exception
     */

    public function getUserAllPaginatePastes(User $user , int $paginateValue): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {


        return $user->getUserPastes()
            ->where('delete_time', '>', $this->getCurrentTime())
            ->orderByDesc('created_at')
            ->paginate($paginateValue);

    }

   public function delete(Paste $paste){

       $paste->delete();

   }

}
