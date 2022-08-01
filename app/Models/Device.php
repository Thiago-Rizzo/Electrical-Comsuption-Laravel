<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'power',
        'user_id',
    ];

    public function container()
    {
        return $this->HasMany(ContainerDevice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
