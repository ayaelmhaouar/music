<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'cover_image'];

    // Relation Many-to-Many avec Music
    public function musics()
    {
        return $this->belongsToMany(Music::class, 'playlist_music', 'playlist_id', 'music_id');
    }
}
