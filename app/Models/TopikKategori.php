<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopikKategori extends Model
{
    use HasFactory;
    protected $table = 'topik_kategoris';
    protected $guarded = [];

    public function topik()
    {
        return $this->hasMany(Topik::class, 'kategori_id', 'id');
    }
}
