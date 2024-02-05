@extends('layouts.app')

@section('title', 'Index')

@section('content')
<section class="container">
    <table class="table">
        <tr>
            <th>No</th>
            <th>Kode IT</th>
            <th>PC/NB</th>
            <th>Dept</th>
            <th>PIC</th>
            <th>Aksi</th>
        </tr>
        @foreach($assetit as $asset)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="/{{ $asset->kd_it }}">{{ $asset->kd_it }}</a></td>
            <td>{{ $asset->jenis }}</td>
            <td>{{ $asset->dept }}</td>
            <td>{{ $asset->pic }}</td>
            <td></td>
        </tr>
        @endforeach
    </table>
</section>
@endsection