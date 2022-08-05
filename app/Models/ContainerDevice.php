<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContainerDevice extends Model
{
    protected $fillable = [
        'container_id',
        'device_id',
        'consu_time',
        'consu_days',
        'quantity',
    ];

    protected $with = [
        'device'
    ];

    public function container()
    {
        return $this->belongsTo(Container::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
