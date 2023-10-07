<?php

namespace App\Action;

use TCG\Voyager\Actions\AbstractAction;

class BanAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Ban/Unban';
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return 'voyager-bomb';
    }

    public function getPolicy()
    {

    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-danger pull-right',
            'style' => 'margin-right: 5px',
            'data-id' => $this->data->{$this->data->getKeyName()},

            'value'=>$this->data->{$this->data->getKeyName()},
            'name' => 'id'
        ];
    }

    /**
     * @return string
     */
    public function getDefaultRoute()
    {
        return route('user.ban',$this->data->{$this->data->getKeyName()});
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'users';
    }
}
