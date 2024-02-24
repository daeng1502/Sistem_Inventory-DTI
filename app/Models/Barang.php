<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Tetapkan kolom 'created_at' sebagai waktu pembuatan dan 'updated_at' sebagai waktu pembaruan
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $primaryKey = 'SN'; // Tentukan kolom 'SN' sebagai primary key
    public $incrementing = false; // Set false agar Laravel tidak menganggap kolom ini auto-increment
    protected $keyType = 'string'; // Tentukan tipe data primary key

    /**
     * Ambil data barang yang diurutkan berdasarkan waktu pembuatan secara descending.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
        public static function latestData()
        {
            return static::orderBy('created_at', 'desc')->get();
        }
}
