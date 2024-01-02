<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\PhotoMarker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class MarkerController extends Controller
{
    public function store(Request $request, $id)
    {
        $marker = PhotoMarker::create([
            'photo_id' => $id,
            'code' => $request->input('code'),
            'type' => $request->input('type'),
            'html' => $request->input('html'),
            'icon_path' => $request->input('icon_path'),
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

        return response()->json($marker);
    }

    public function update(Request $request, $id)
    {
        Log::info('Request Data:', $request->all());
        Log::info('Marker ID:', ['id' => $id]);

        $marker = PhotoMarker::find($id);

        $marker->update([
            'code' => $request->input('code'),
            'yaw' => $request->input('yaw'),
            'pitch' => $request->input('pitch'),
        ]);

        return response()->json($marker);
    }

    public function updateMarkerInfo(Request $request, $id)
    {
        Log::info('Request Data:', $request->all());
        Log::info('Marker ID:', ['id' => $id]);

        $marker = PhotoMarker::find($id);

        $marker->update([
            'html' => $request->input('html'),
            'tooltip' => $request->input('tooltip'),
            'content' => $request->input('content'),
        ]);

        return response()->json($marker);
    }
}
