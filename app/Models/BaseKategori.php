<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BaseKategori extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected static function boot()
    {
        parent::boot();

        // static::deleting(function ($base) {
        //     $base->kategori()->delete();
        //     $base->paket()->delete();
        // });
    }

    public function kategori(): HasMany
    {
        return $this->hasMany(Kategori::class, 'base_id');
    }
    public function paket(): HasMany
    {
        return $this->hasMany(Paket::class, 'base_id');
    }
}
