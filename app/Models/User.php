<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class User extends \TCG\Voyager\Models\User

{
    use HasFactory;
    protected $guarded = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getUserPastes()
    {
        return $this->hasMany(Paste::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getUserComplaints()
    {
        return $this->hasMany(Complaint::class);
    }
}
