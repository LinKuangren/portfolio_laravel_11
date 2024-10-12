<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Productions extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'url',
    ];

    public function categories() {
        return $this->belongsToMany(Categories::class);
    }

    public function imageUrl(): String {
        return Storage::disk('public')->url($this->image);
    }
}
