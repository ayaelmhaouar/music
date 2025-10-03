<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Playlist",
 *     description="Gestion des playlists"
 * )
 */
class PlaylistController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/playlists",
     *     summary="Lister toutes les playlists",
     *     tags={"Playlist"},
     *     @OA\Response(
     *         response=200,
     *         description="Liste de playlists",
     *         @OA\JsonContent(type="array", @OA\Items(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="name", type="string", example="My Playlist"),
     *             @OA\Property(property="user_id", type="integer", example=2)
     *         ))
     *     )
     * )
     */
    public function index()
    {
        return response()->json(Playlist::all(), 200);
    }

    /**
     * @OA\Post(
     *     path="/api/playlists",
     *     summary="Créer une playlist",
     *     tags={"Playlist"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "user_id"},
     *             @OA\Property(property="name", type="string", example="Workout Mix"),
     *             @OA\Property(property="user_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Playlist créée",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=10),
     *             @OA\Property(property="name", type="string", example="Workout Mix"),
     *             @OA\Property(property="user_id", type="integer", example=1)
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|integer'
        ]);

        $playlist = Playlist::create($request->all());
        return response()->json($playlist, 201);
    }

    /**
 * @OA\Get(
 *     path="/api/playlists/{id}",
 *     summary="Afficher une playlist avec ses musiques",
 *     tags={"Playlist"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Playlist trouvée avec ses musiques",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="name", type="string", example="Chill Vibes"),
 *             @OA\Property(property="user_id", type="integer", example=2),
 *             @OA\Property(
 *                 property="musics",
 *                 type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="id", type="integer", example=5),
 *                     @OA\Property(property="title", type="string", example="Lo-Fi Beat"),
 *                     @OA\Property(property="artist", type="string", example="DJ Relax"),
 *                     @OA\Property(property="album", type="string", example="Lo-Fi Collection"),
 *                     @OA\Property(property="duration", type="integer", example=180)
 *                 )
 *             )
 *         )
 *     )
 * )
 */

    public function show(Playlist $playlist)
    {
        return response()->json($playlist, 200);
    }

    /**
     * @OA\Put(
     *     path="/api/playlists/{id}",
     *     summary="Modifier une playlist",
     *     tags={"Playlist"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Updated Playlist"),
     *             @OA\Property(property="user_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Playlist mise à jour",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="name", type="string", example="Updated Playlist"),
     *             @OA\Property(property="user_id", type="integer", example=1)
     *         )
     *     )
     * )
     */
    public function update(Request $request, Playlist $playlist)
    {
        $playlist->update($request->all());
        return response()->json($playlist, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/playlists/{id}",
     *     summary="Supprimer une playlist",
     *     tags={"Playlist"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Playlist supprimée")
     * )
     */
    public function destroy(Playlist $playlist)
    {
        $playlist->delete();
        return response()->json(null, 204);
    }
}
