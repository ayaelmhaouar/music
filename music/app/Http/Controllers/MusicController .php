<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        // Pagination : 10 musiques par page
        $musics = Music::paginate(10);

        return response()->json($musics, 200);
       return response()->json([
            ['id' => 1, 'title' => 'Song 1', 'artist' => 'Artist 1'],
            ['id' => 2, 'title' => 'Song 2', 'artist' => 'Artist 2']
        ]);
    }

    public function store(Request $request)
    {
        $music = Music::create($request->all());
        return response()->json($music, 201);
    }

    public function show(Music $music)
    {
        return response()->json($music, 200);
    }

    public function update(Request $request, Music $music)
    {
        $music->update($request->all());
        return response()->json($music, 200);
    }

    public function destroy(Music $music)
    {
        $music->delete();
        return response()->json(null, 204);
    }
}
