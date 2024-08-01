<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Testing\Fakes\Fake;

class Paket extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function setUuidAttribute($value)
    {
        $this->attributes['uuid'] = $value ?: 'tanamtanamubi'; // Adjust length as needed
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function soal(): HasMany
    {
        return $this->hasMany(Soal::class, 'paket_id');
    }
}
