<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    protected $fillable = [
        'name',
        'cost',
        'icon',
    ];

    public function container()
    {
        return $this->HasMany(Container::class);
    }
}
