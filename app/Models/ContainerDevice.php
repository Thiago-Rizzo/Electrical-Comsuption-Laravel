<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
}
