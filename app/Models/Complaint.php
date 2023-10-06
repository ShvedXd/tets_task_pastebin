<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaint extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $guarded = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getUser()
    {
        return $this->hasOne(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getPaste()
    {
        return $this->hasOne(Paste::class);
    }
}
