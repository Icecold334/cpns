<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    // guarded columns
    protected $guarded = ['id'];

    public function soal(): HasMany
    {
        return $this->hasMany(Soal::class, 'id_kategori');
    }
}
