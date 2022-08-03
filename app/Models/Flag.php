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
        'id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function container()
    {
        return $this->HasMany(Container::class);
    }
}
