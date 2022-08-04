<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    protected $fillable = [
        'name',
        'flag_id',
        'user_id',
    ];

    public function devices()
    {
        return $this->belongsToMany(Device::class, 'container_devices');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flag()
    {
        return $this->belongsTo(Flag::class);
    }
}
