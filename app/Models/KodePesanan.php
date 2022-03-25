<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodePesanan extends Model
{
    use HasFactory;

    public function order()
    {
       return $this->hasMany(Order::class, 'kodepesanan_id');
    }

    public function transaksi()
    {
        return $this->HasMany(Transaksi::class, 'kodepesanan_id');
    }
}
