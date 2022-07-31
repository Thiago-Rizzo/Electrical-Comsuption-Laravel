<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    protected $fillable = [
        'name',
        'flag_id',
        'user_id',
    ];

    public function device() {
        return $this->HasMany(Container::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function flag() {
        return $this->belongsTo(Flag::class);
    }
}
