<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'caption',
        'description',
        'photo_name',
        'photo_path',
    ];

    public function markers()
    {
        return $this->hasMany(PhotoMarker::class);
    }
}
