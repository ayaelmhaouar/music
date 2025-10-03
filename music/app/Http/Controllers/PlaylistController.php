<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()-<json(playlist::all(),200);

 return response()->json([
            ['id' => 1, 'name' => 'Playlist 1'],
            ['id' => 2, 'name' => 'Playlist 2']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $playlist = Playlist::create($request->all());
        return response()->json($playlist, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
         return response()->json($playlist, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
          $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $playlist->update($request->all());
        return response()->json($playlist, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
         $playlist->delete();
        return response()->json(null, 204);
    }
}
