<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\log_pemakai;
use App\Models\assetit;

class LogPemakaiControl extends Controller
{
    public function index($kd_it) {
        $data = log_pemakai::where("kd_it", $kd_it)->get();
        return view('log_use.data', ['data' => $data]);
    }
    public function update($kd_it) {
        $assetit_up = assetit::where("kd_it", $kd_it)->get();
        $log_user = log_pemakai::latest("kd_it", $kd_it)->limit(1)->get();
        return view('log_use.update', ['assetit_up' => $assetit_up, 'log_user' => $log_user]);
    }
    public function store(Request $request){
        $request->validate([
            'pic' => 'required',
            'dept' => 'required',
            'kd_it' => 'required',
            'tgl_awal' => 'required'
        ]);
        $asset = assetit::where('kd_it', $request->kd_it);
        $asset = $asset->update(['pic'=>$request->pic, 'dept'=>$request->dept]);
        $logLama = log_pemakai::where("kd_it", $request->kd_it)->latest()->limit(1);
        $logLama = $logLama->update(['tgl_akhir'=>$request->tgl_awal]);
        $logBaru = log_pemakai::create([
            'kd_it' => $request->kd_it,
            'dept' => $request->dept,
            'pic' => $request->pic,
            'tgl_awal' => $request->tgl_awal,
            'tgl_akhir' => $request->tgl_awal,
            'kondisi' => $request->kondisi
        ]);
        return redirect()->route('index.home');
    }
    public function create($kd_it) {
        $assetit = assetit::where('kd_it', $kd_it)->get();
        return view('log_use.tambah', ['assetit' => $assetit]);
    }
    public function insert($kd_it, Request $request){
        $logUser = log_pemakai::create([
            'kd_it' => $request->kd_it,
            'dept' => $request->dept,
            'pic' => $request->pic,
            'tgl_awal' => $request->tgl_awal,
            'tgl_akhir' => $request->tgl_awal,
            'kondisi' => $request->kondisi
        ]);
        return redirect()->route('index.home');
    }
}
