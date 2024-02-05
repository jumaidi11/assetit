<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log_mtc extends Model
{
    use HasFactory;

    protected $table = 'log_mtc';
    protected $fillable = ['id', 'kd_it', 'tgl', 'pic', 'kondisi'];
}
