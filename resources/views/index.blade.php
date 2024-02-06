@extends('layouts.app')

@section('title', 'Index')

@section('content')
<section class="container">
    <section class="table-responsive">
    <table class="table">
        <tr>
            <th>No</th>
            <th>Kode IT</th>
            <th>Kode Asset</th>
            <th>PC/NB</th>
            <th>Dept</th>
            <th>PIC</th>
            <th>Merek</th>
            <th>Model</th>
            <th>Tahun Beli</th>
            <th colspan="3" class="text-center">Aksi</th>
        </tr>
        @foreach($assetit as $asset)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="{{ route('index', ['kd_it' => $asset->kd_it]) }}">{{ $asset->kd_it }}</a></td>
            <td>{{ $asset->kd_asset }}</td>
            <td>{{ $asset->jenis }}</td>
            <td>{{ $asset->dept }}</td>
            <td>{{ $asset->pic }}</td>
            <td>{{ $asset->merek }}</td>
            <td>{{ $asset->model }}</td>
            <td>{{ $asset->tahun_beli }}</td>
            <td><a href="{{ route('log.index', ['kd_it' => $asset->kd_it]) }}" class="btn btn-primary">History</a></td>
            @auth
            <td><a href="{{ route('log.create', ['kd_it' => $asset->kd_it]) }}" class="btn btn-primary">Insert</a></td>
            <td><a href="{{ route('log.update', ['kd_it' => $asset->kd_it]) }}" class="btn btn-primary">Update</a></td>
            @endauth
        </tr>
        @endforeach
    </table>
    </section>
</section>
@endsection