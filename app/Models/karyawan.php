<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
    protected $visible = ['nama', 'alamat', 'nik', 'no_telp'];
    protected $fillable = ['nama', 'alamat', 'nik', 'no_telp'];
    public $timestamps = true;
}
