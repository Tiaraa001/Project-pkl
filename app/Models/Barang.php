<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Barang extends Model
{
    use HasFactory;
   protected $table = "barangs";

    protected $visible = ['id_kategori', 'nama_barang', 'id_satuan', 'stock', 'harga'];
    protected $fillable = ['id_kategori', 'nama_barang', 'id_satuan', 'stock', 'harga'];
    public $timestamps = true;

    // membuat relasi one to many
    public function orders()
    {
        return $this->hasMany(Order::class, 'id_barang');
    }
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }
}
