<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // protected $visible = ['nama', 'menu_id', 'jumlah', 'tanggal', 'kodepesanan_id'];
    // //memberikan akses data apa saja yang bisa di isi
    // protected $fillable = ['nama', 'menu_id', 'jumlah', 'tanggal', 'kodepesanan_id'];

    public $timestamp = true;

    //    membuat relasi one to many
    public function barangs()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    // public function customers()
    // {
    //     return $this->belongsTo('App\Models\Customer', 'customer_id');
    // }

    public function kodepesanan()
    {
        return $this->belongsTo(KodePesanan::class, 'kodepesanan_id');
    }
}
