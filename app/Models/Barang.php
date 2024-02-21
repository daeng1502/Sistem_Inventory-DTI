<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'SN'; // Tentukan kolom 'SN' sebagai primary key
    public $incrementing = false; // Set false agar Laravel tidak menganggap kolom ini auto-increment
    protected $keyType = 'string'; // Tentukan tipe data primary key

    // protected $fillable = [
    //     'SN'
    // ];
}
