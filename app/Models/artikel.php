<?php

namespace App\Models;

use App\Models\kategori;
use App\Models\Wilayah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class artikel extends Model
{
    use HasFactory;
    protected $table='artikel';

    protected $fillable=[
        'judul',
        'slug',
        'body',
        'kategori_id',
        'wilayah_id',
        'user_id',
        'gambar_artikel',
        'is_active',
        'views'
    ];
    protected $hidden=[];

    public function kategoris(): BelongsTo
    {
        return $this->belongsTo(kategori::class, 'kategori_id', 'id');
    }
    public function Wilayahs(): BelongsTo
    {
        return $this->belongsTo(Wilayah::class, 'wilayah_id', 'id');
    }
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
