<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log_pemakai extends Model
{
    use HasFactory;

    protected $table = 'log_pemakais';
    protected $fillable = ['id', 'kd_it', 'dept', 'pic', 'location', 'tgl_awal', 'tgl_akhir', 'kondisi'];
}
