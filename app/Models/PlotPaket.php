<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlotPaket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function paket(): BelongsTo
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_siswa');
    }
}
