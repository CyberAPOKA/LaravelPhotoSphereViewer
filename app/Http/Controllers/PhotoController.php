<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filePath = $file->store('public/photos');
            $filePath = str_replace('public/', 'storage/', $filePath);
            $filePath = str_replace('storage/photos/', '', $filePath);

            $photo = Photo::create([
                'photo_name' => $file->getClientOriginalName(),
                'photo_path' => $filePath
            ]);

            // $url = asset($filePath);

            return response()->json(['url' => $filePath, 'id' => $photo->id])
                ->header('Access-Control-Allow-Origin', '*');
        }

        return response()->json(['message' => 'Nenhum arquivo foi enviado'], 400);
    }

    public function show($filename)
    {
        $path = storage_path('app/public/photos/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function photos()
    {
        $photos = Photo::with('markers')->get();

        return $photos;
    }

    public function updatePhotoInfo(Request $request, $id)
    {
        Log::info('Request Data:', $request->all());
        Log::info('Photo ID:', ['id' => $id]);

        $photo = Photo::findOrFail($id);

        $photo->update([
            'caption' => $request->input('caption'),
            'description' => $request->input('description')
        ]);

        return response('success', 200);
    }
}
