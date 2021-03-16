<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavouriteBreed extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'location_id',
        'breed_id',
    ];
}
