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

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function container()
    {
        return $this->belongsToMany(Container::class, 'container_devices')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
