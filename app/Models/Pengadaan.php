<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;


class Pengadaan extends Model
{
    use HasFactory;
    protected $table = 'pengadaans';
    // protected $fillable = ['user_id','barang', 'merk', 'jumlah', 'deskripsi','tanggal'];
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
