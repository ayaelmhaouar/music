<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Music",
 *     description="Opérations sur les musiques"
 * )
 */
class MusicController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/music",
     *     summary="Liste de toutes les musiques",
     *     tags={"Music"},
     *     @OA\Response(
     *         response=200,
     *         description="Liste de musiques",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="title", type="string", example="Song 1"),
     *                 @OA\Property(property="artist", type="string", example="Artist 1"),
     *                 @OA\Property(property="album", type="string", example="Album 1"),
     *                 @OA\Property(property="duration", type="integer", example=180)
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        return response()->json(Music::all(), 200);
    }

    /**
     * @OA\Post(
     *     path="/api/music",
     *     summary="Créer une nouvelle musique",
     *     tags={"Music"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title","artist"},
     *             @OA\Property(property="title", type="string", example="Song 1"),
     *             @OA\Property(property="artist", type="string", example="Artist 1"),
     *             @OA\Property(property="album", type="string", example="Album 1"),
     *             @OA\Property(property="duration", type="integer", example=180)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Musique créée",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example=10),
     *             @OA\Property(property="title", type="string", example="Song 1"),
     *             @OA\Property(property="artist", type="string", example="Artist 1"),
     *             @OA\Property(property="album", type="string", example="Album 1"),
     *             @OA\Property(property="duration", type="integer", example=180)
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'album' => 'nullable|string|max:255',
            'duration' => 'nullable|integer',
             'file_url' => 'required|string|max:255',
        ]);

        $music = Music::create($request->all());
        return response()->json($music, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/music/{id}",
     *     summary="Voir une musique",
     *     tags={"Music"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Musique trouvée",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="title", type="string", example="Song 1"),
     *             @OA\Property(property="artist", type="string", example="Artist 1"),
     *             @OA\Property(property="album", type="string", example="Album 1"),
     *             @OA\Property(property="duration", type="integer", example=180)
     *         )
     *     )
     * )
     */
    public function show(Music $music)
    {
        return response()->json($music, 200);
    }

    /**
     * @OA\Put(
     *     path="/api/music/{id}",
     *     summary="Mettre à jour une musique",
     *     tags={"Music"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", example="Updated Song"),
     *             @OA\Property(property="artist", type="string", example="Updated Artist"),
     *             @OA\Property(property="album", type="string", example="Updated Album"),
     *             @OA\Property(property="duration", type="integer", example=200)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Musique mise à jour",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="title", type="string", example="Updated Song"),
     *             @OA\Property(property="artist", type="string", example="Updated Artist"),
     *             @OA\Property(property="album", type="string", example="Updated Album"),
     *             @OA\Property(property="duration", type="integer", example=200)
     *         )
     *     )
     * )
     */
    public function update(Request $request, Music $music)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'artist' => 'sometimes|required|string|max:255',
            'album' => 'nullable|string|max:255',
          
            'duration' => 'nullable|integer',
            'file_url' => 'sometimes|required|string|max:255',
        ]);

        $music->update($request->all());

        return response()->json($music, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/music/{id}",
     *     summary="Supprimer une musique",
     *     tags={"Music"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Musique supprimée"
     *     )
     * )
     */
    public function destroy(Music $music)
    {
        $music->delete();
        return response()->json(null, 204);
    }
}
