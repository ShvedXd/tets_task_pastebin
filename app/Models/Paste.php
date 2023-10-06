<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paste extends Model
{
    use HasFactory;

    protected $guarded = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getUser()
    {
        return $this->hasOne(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getComplains()
    {
        return $this->hasMany(Complaint::class);
    }
}
