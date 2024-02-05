<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\assetit;

class AssetITControl extends Controller
{
    public function index($kd_it){
        $data = assetit::where("kd_it", $kd_it)->first();
    }
}
