<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\assetit;
use App\Models\img_assetit;
use App\Models\log_mtc;
use Redirect;
use File;
use Carbon\Carbon;

class AssetITControl extends Controller
{
    public function index($kd_it){
        $data = assetit::where("kd_it", $kd_it)->first();
        $tahun_beli = $data->tahun_beli;
        $tanggal = Carbon::parse($tahun_beli . '-01-01');
        $usia = $tanggal->diffInYears(Carbon::now());
        $img_assetit = img_assetit::where("kd_it", $kd_it)->get();
        $log_mtc = log_mtc::where("kd_it", $kd_it)->get();
        return view('home.data', ['data' => $data, 'img_assetit' => $img_assetit, 'log_mtc' => $log_mtc, 'usia' => $usia]);
    }
    //ini fungsi create log
    public function create(Request $request){
        $data = log_mtc::create([
            'kd_it' => $request->kd_it,
            'tgl' => $request->tgl,
            'pic' => $request->pic,
            'kondisi' => $request->kondisi,
        ]);
        return Redirect::back();
    }
    // ini fungsi hapus log
    public function destroy(Request $request){
        $id = $request->input('id');
        $log = new log_mtc();
        $log = $log->where('id', $id)->find($id);
        $log = $log->delete();
        return Redirect::back();
    }
    // ini fungsi edit log
    public function edit(Request $request){
        $request->validate([
            'kd_it' => 'required',
            'tgl' => 'required',
            'pic' => 'required',
            'kondisi' => 'required',
        ]);
        $log = new log_mtc();
        $id = $request->input('id');
        $log = $log->findOrFail($id);
        $log = $log->update($request->all());
        return Redirect::back();
    }
    // ini fungsi update foto
    public function store(Request $request)
    {
        //upload file baru ke folder img
        $image = $request->file('image');
        $destinationPath = 'img/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
       
        // insert data link foto di db 
        $simpan = img_assetit::create([
            'id' => null,
            'kd_it' => $request->kd_it,
            'url' => $profileImage,
        ]);
        return Redirect::back();
    }
    public function delete(Request $request)
    {
        // hapus file yg lama di folder img
        $id = $request->id;
        $data = img_assetit::findOrFail($id);
        $url = $data->url;
        File::delete('img/'.$url);
        $data->delete();
        return Redirect::back();
    }
}

