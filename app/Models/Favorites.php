<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Favorites extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'id_game',
        'user_id',
    ];

    public function userRelation()
    {
        return $this->belongsTo(User::class, 'user');
    }
}
