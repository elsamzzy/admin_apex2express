<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracks_id',
        'shipping_info',
        'description',
        'user_id'
    ];

    public function details(Track $track) {
        return $this->latest()->get()->where('tracks_id', $track->id);
    }
}
