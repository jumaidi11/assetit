<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assetit extends Model
{
    use HasFactory;
    
    protected $table = "assetit";
    protected $fillable = ['kd_it', 'kd_asset', 'dept', 'jenis', 'pic', 'merek', 'model', 'tahun_beli'];
}
