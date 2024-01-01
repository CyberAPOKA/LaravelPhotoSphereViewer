<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoMarker extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_id',
        'code',
        'image_path',
        'tooltip',
        'content',
        'yaw',
        'pitch',
        'clientX',
        'clientY',
        'textureX',
        'textureY',
        'viewerX',
        'viewerY',
    ];

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
