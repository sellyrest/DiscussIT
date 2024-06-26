<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'fullname',
        'email',
        'password',
        'nomor_telpon',
        'foto',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function topik() {
        return $this->hasMany(Topik::class, 'user_id', 'id');
    }

    public function saveds()
    {
        return $this->hasMany(Saved::class, 'user_id', 'id');
    }

    public function report()
    {
        return $this->hasMany(Report::class, 'table_id', 'id')->where('table_name', 'users');
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function followers()
    {
        return $this->hasMany(Following::class, 'user_id', 'id');
    }
}
