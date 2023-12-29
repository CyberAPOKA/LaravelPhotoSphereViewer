<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\PhotoMarker;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    public function store(Request $request, $id)
    {
        PhotoMarker::create([
            'photo_id' => $id,
            // 'image_path' => 'teste',
            'tooltip' => $request->input('tooltip'),
            'content' => $request->input('content'),
            'yaw' => $request->input('yaw'),
            'pitch' => $request->input('pitch'),
            'clientX' => $request->input('clientX'),
            'clientY' => $request->input('clientY'),
            'textureX' => $request->input('textureX'),
            'textureY' => $request->input('textureY'),
            'viewerX' => $request->input('viewerX'),
            'viewerY' => $request->input('viewerY'),
        ]);
    }
}
