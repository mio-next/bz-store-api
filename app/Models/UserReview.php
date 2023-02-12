<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    protected $casts = ['images' => 'array'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
