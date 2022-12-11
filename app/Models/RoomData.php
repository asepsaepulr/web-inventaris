<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomData extends Model
{
    use HasFactory;
    protected $table = 'room_data';

    protected $fillable = [
        'status', 'quantity', 'room_id', 'inventory_id',
    ];

}
