<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
 public function user() {
    return $this->belongsTo(User::class);
}

public function musics() {
    return $this->belongsToMany(Music::class, 'playlist_music', 'playlist_id', 'music_id');
}


}
