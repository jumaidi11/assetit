<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\log_pemakai;

class LogPemakaiControl extends Controller
{
    public function index($kd_it) {
        $data = log_pemakai::where("kd_it", $kd_it)->get();
        return view('log_use.data', ['data' => $data]);
    }
}
