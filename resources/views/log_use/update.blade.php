@extends('layouts.app')

@section('title', 'Update')

@section('content')
<section class="container">
<a href="{{ route('index.home') }}" class="btn btn-primary">Kembali</a>
@foreach($assetit_up as $asset)
<form action="{{ route('log.store', ['kd_it' => $asset->kd_it]) }}" method="post">
@csrf
@method('POST')
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="kd_it">Kode IT</label>
            <input type="text" required="required" name="kd_it" class="form-control bg-secondary" value="{{ $asset->kd_it }}" readonly />
        </div>
        <div class="form-group">
            <label for="pic">PIC</label>
            <input type="text" required="required" name="pic" class="form-control" value="{{ $asset->pic }}" />
        </div>
        <div class="form-group">
            <label for="jenis">Jenis</label>
            <input type="text" required="required" name="jenis" class="form-control bg-secondary" value="{{ $asset->jenis }}" readonly />
        </div>
        <div class="form-group">
            <label for="merek">Merek</label>
            <textarea name="merek" required="required" class="form-control bg-secondary" readonly>{{ $asset->merek }}</textarea>
        </div>
        @foreach($log_user as $log)
        <div class="form-group">
            <label for="tgl_awal">Tanggal Awal</label>
            <input type="date" required="required" name="tgl_awal" class="form-control" value="{{ $log->tgl_awal }}" />   
        </div>
        @endforeach
        <div class="form-group">
            <label for="location">Lokasi</label>
            <input type="text" required="required" name="location" class="form-control" value="{{ $log->location }}" />
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="kd_asset">Kode Asset</label>
            <input type="text" required="required" name="kd_asset" class="form-control bg-secondary" value="{{ $asset->kd_asset }}" readonly />
        </div>
        <div class="form-group">
            <label for="dept">Dept</label>
            <!-- default user input adalah user login sesuai authentikasi -->
            <input type="text" required="required" name="dept" class="form-control" value="{{ $asset->dept }}" />
        </div>
        <div class="form-group">
            <label for="tahun_beli">Tahun Beli</label>
            <!-- default user input adalah user login sesuai authentikasi -->
            <input type="number" required="required" min="1999" name="tahun_beli" class="form-control bg-secondary" value="{{ $asset->tahun_beli }}" readonly />
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <textarea name="model" required="required" class="form-control bg-secondary" readonly>{{ $asset->model }}</textarea>
        </div>
        <div class="form-group">
            <label for="ipaddress">IP Address</label>
            <input type="text" required="required" name="ipaddress" class="form-control bg-secondary" value="{{ $asset->ipaddress }}" readonly />
        </div>
        @foreach($log_user as $log)
        <div class="form-group">
            <label for="kondisi">Kondisi</label>
            <input type="text" required="required" name="kondisi" class="form-control" value="{{ $log->kondisi }}" />
        </div>
        @endforeach
        <div class="form-group">
            <input type="submit" class="form-control btn btn-primary mt-2" value="Simpan" />    
        </div>
    </div>
</div>
</form>
</section>
@endforeach
@endsection