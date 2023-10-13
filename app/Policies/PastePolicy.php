<?php

namespace App\Policies;

use App\Models\Paste;
use App\Models\User;
use App\Services\Paste\Service;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PastePolicy
{
    use HandlesAuthorization;

    /**
     * @var Service
     */
    private $service;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * @param User|null $user
     * @param Paste $paste
     * @return Response
     * @throws \Exception
     */

    public function showPaste(?User $user, Paste $paste): Response
    {
        if ($this->service->isExposure($paste)) {
            return Response::deny('Time is out');
        }


        if ($paste->access_type == 'private') {
            if (!is_null($user)){
            if ($user->id == $paste->user_id) {

                return Response::allow();

            }

            return Response::deny('This is private paste');
            }
        }

        return Response::allow();


    }

    public function storePrivate(?User $user, string $accessType )
    {

        if(is_null($user) && $accessType === 'private'){

            $message = 'You will not see this paste. Please Login to create private pastes';
            return Response::deny($message);
        }
        return Response::allow();
    }

}
