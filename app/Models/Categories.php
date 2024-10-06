<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function productions() {
        return $this->belongsToMany(Productions::class);
    }

    public function experiences() {
        return $this->belongsToMany(Experiences::class);
    }
}
