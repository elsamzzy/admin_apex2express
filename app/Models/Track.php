<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
        'track_id',
        'tracking_number',
        'status',
        'date',
        'origin',
        'destination',
        'mode',
        'weight',
        'shipper_name',
        'shipper_phone',
        'shipper_address',
        'consignee_name',
        'consignee_address',
        'consignee_phone',
        'booking_mode',
        'description',
    ];

    public function trackList() {
       return $this->get()->where('user_id', auth()->user()->id);
    }

    public function details($id) {
        return $this->where('id', $id)->first();
    }

}
