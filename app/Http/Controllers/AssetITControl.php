<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\assetit;
use App\Models\img_assetit;
use App\Models\log_mtc;

class AssetITControl extends Controller
{
    public function index($kd_it){
        $data = assetit::where("kd_it", $kd_it)->first();
        $img_assetit = img_assetit::where("kd_it", $kd_it)->get();
        $log_mtc = log_mtc::where("kd_it", $kd_it)->get();
        return view('home.data', ['data' => $data, 'img_assetit' => $img_assetit]);
    }
}
