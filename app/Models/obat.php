<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    use HasFactory;

    protected $visible = ['kode', 'nama', 'harga', 'stok', 'satuan'];
    protected $fillable = ['kode', 'nama', 'harga', 'stok', 'satuan'];
    public $timestamps = true;
}
