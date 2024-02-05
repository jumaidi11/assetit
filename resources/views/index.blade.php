@extends('layouts.app')

@section('title', 'Index')

@section('content')
<section class="container">
    <table class="table">
        <tr>
            <th>No</th>
            <th>Kode IT</th>
            <th>Dept</th>
            <th>PIC</th>
            <th>Serah Terima/Awal Pemakaian</th>
            <th>Aksi</th>
        </tr>
        @foreach($assetit as $asset)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $asset->kd_it }}</td>
            <td>{{ $asset->dept }}</td>
            <td>{{ $asset->pic }}</td>
            <td></td>
        </tr>
        @endforeach
    </table>
</section>
@endsection