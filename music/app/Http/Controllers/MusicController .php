<?php

namespace App\Http\Controllers;


use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
   
/**
 * @OA\Info(
 *     title="API Musique",
 *     version="1.0.0",
 *     description="Documentation interactive de l'API Musique réalisée avec Laravel et L5-Swagger",
 *     @OA\Contact(
 *         email="contact@example.com"
 *     )
 * )
 */


    public function index()
    {
       return Music ::all();
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
        
        $music = Music::create($request->all());
        return response()->json($music, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Music $music)
    {
          return  $music ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Music $music)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Music $music)
    {
         $music ->update ($request->all());
         return response ()->json ( $music, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Music $music)
    {
         $music->delete();
         return response()->json (null, 204);
}

}