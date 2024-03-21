<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // Definisikan relasi dengan pengirim pesan (User)
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Definisikan relasi dengan penerima pesan (User)
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}