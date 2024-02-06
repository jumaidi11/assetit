@extends('layouts.app')

@section('title', 'History Penggunaan')

@section('content')
<section class="container">
    <a href="{{ route('index.home') }}" class="btn btn-primary">Kembali</a>
    <section class="table-responsive">
    <table class="table">
        <tr>
            <th>No</th>
            <th>Kode IT</th>
            <th>Dept</th>
            <th>PIC</th>
            <th>Tgl Awal</th>
            <th>Tgl Akhir</th>
            <th>Kondisi</th>
        </tr>
        @foreach($data as $log)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $log->kd_it }}</td>
            <td>{{ $log->dept }}</td>
            <td>{{ $log->pic }}</td>
            <td>{{ $log->tgl_awal }}</td>
            <td>{{ $log->tgl_akhir }}</td>
            <td>{{ $log->kondisi }}</td>
        </tr>
        @endforeach
    </table>
    </section>
</section>
@endsection