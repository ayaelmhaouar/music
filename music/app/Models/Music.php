<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

   
    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_music', 'music_id', 'playlist_id');
    }

    protected $fillable = ['title', 'artist', 'album', 'genre', 'file_url'];
}
