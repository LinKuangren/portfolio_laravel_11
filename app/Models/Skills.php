<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Skills extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'level',
    ];

    public function imageUrl(): String {
        return Storage::disk('public')->url($this->image);
    }
}
