<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    use HasFactory;
    
    protected $table = 'followers';
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function follows() {
        return $this->belongsTo(Following::class, 'follower_id', 'id');
    }

    public function userFollowerCount($userId) {
        return $this->where('id', '=', $userId)->count();
    }
}
