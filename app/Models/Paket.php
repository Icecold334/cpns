<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paket extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = fake()->uuid();
        });
        // static::deleting(function ($paket) {
        //     $paket->hasil()->delete();
        //     $paket->soal()->delete();
        // });
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function base(): BelongsTo
    {
        return $this->belongsTo(BaseKategori::class, 'base_id');
    }
    public function soal(): HasMany
    {
        return $this->hasMany(Soal::class, 'paket_id');
    }
    public function hasil(): HasMany
    {
        return $this->hasMany(Hasil::class, 'paket_id');
    }
}
