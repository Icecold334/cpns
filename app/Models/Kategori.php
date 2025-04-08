<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        // static::deleting(function ($kategori) {
        //     $kategori->soal()->delete();
        //     $kategori->hasil()->delete();
        // });
    }

    public function soal(): HasMany
    {
        return $this->hasMany(Soal::class, 'kategori_id');
    }
    public function hasil(): HasMany
    {
        return $this->hasMany(Hasil::class, 'kategori_id');
    }
    public function base(): BelongsTo
    {
        return $this->belongsTo(BaseKategori::class, 'base_id');
    }
}
