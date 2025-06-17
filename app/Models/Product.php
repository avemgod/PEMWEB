<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'is_active',
    ];

    // Atau, jika Anda ingin mengizinkan semua kecuali yang secara eksplisit tidak diizinkan,
    // gunakan $guarded (jarang disarankan untuk keamanan):
    // protected $guarded = []; // Mengizinkan semua kolom untuk mass assignment, HATI-HATI!
}