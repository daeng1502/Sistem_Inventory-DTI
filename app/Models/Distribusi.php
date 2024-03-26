<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    protected $connection = 'mysql';
    protected $table = 'distribusi';
    protected $primaryKey = 'dist_id';

    // public function barang(): BelongsTo
    // {
    //     return $this->belongsTo(Barang::class, 'id_barang', 'SN');
    // }

    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }

}
