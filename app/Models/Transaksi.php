<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $visible = ['order_id', 'uang', 'total_bayar', 'kembalian', 'tanggal_transaksi'];
    //memberikan akses data apa saja yang bisa di isi
    protected $fillable = ['order_id', 'uang', 'total_bayar', 'kembalian', 'tanggal_transaksi'];

    public $timestamp = true;
    //    membuat relasi one to many
    public function kodepesanan()
    {
        return $this->belongsTo(KodePesanan::class, 'kodepesanan_id');
    }

}
