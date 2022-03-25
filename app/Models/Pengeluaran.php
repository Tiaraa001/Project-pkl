<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $fillable = ['deskripsi', 'jumlah_pengeluaran', 'user_id', 'tanggal_pengeluaran'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
