@extends('layouts.temp')

@section('title', $data->kd_it)

@section('content')
<div class="container">
    <div class="row border">
        <div class="col-lg-6 col-md-9 col-sm-12 mx-auto d-block border" style="height: auto;">
            <!-- foto asset -->
            
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <!-- membuat perulangan dari foto asset -->
                @foreach($img_assetit as $key => $img)
                    <!-- foto asset yang pertama -->
                    @if($key == 0)
                    <div class="carousel-item active">
                        <img class="d-block w-100 img-responsive" style="height: 200px; width: 100%;" src="img/{{ $img->url }}">
                        <center>
                        @auth
                        <form method="post" action="{{ route('delete') }}">
                            @CSRF
                            <input type="hidden" name="id" value="{{ $img->id }}" />
                            <input type="submit" value="Hapus" />
                        </form>
                        @endauth
                        </center>
                    </div>
                    <!-- foto asset yang kedua dan seterusnya -->
                    @elseif($key > 0)
                    <div class="carousel-item">
                        <img class="d-block" style="height:200px; width: 100%;" src="img/{{ $img->url }}">
                        <center>
                        <!-- pengecekan authentikasi user -->
                        @auth
                        <!-- pembuatan tombol delete foto asset -->
                        <form method="post" action="{{ route('delete') }}">
                            @CSRF
                            <input type="hidden" name="id" value="{{ $img->id }}" />
                            <input type="submit" value="Hapus" />
                        </form>
                        @endauth
                        </center>
                    </div>
                    @endif
                @endforeach
                </div>
                <!-- tombol foto before after foto asset -->
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- authentikasi user untuk upload foto jika belum login tidak bisa upload foto -->
            @auth
            <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="kd_it" value="{{ $data->kd_it }}" />
                <input type="file" required="required" style="width: 75%; float: left;" class="form-control form-control-sm" name="image" />
                <button type="submit" class="btn btn-primary" style="width: 20%; float: right;">Upload</button>
            </form>
            @endauth
        </div>
    </div>
    <div class="rows">
        <div class="col-12 border">
            <!-- data asset -->
            <h2 class="ms-3 mt-2 float-left">
                {{ config('app.name', 'Laravel') }}
            </h2>
            <!-- tampilkan button pilihan user -->
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    <!-- jika sudah login maka tampilkan tombol dengan nama user -->
                    @auth
                        <a href="{{ route('home', ['kd_it' => $data->kd_it]) }}" class="btn btn-primary mt-2 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ Auth::user()->name }}</a>
                    <!-- jika belum login muncul tombol login -->
                    @else                 
                        <a href="{{ route('login', ['kd_it' => $data->kd_it]) }}" class="btn btn-primary mt-2 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                    @endauth
                    <a href="{{ route('index.home') }}" class="btn btn-primary mt-2 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Kembali</a>
                </div>
            @endif
            <!-- table data asset -->
            <table class="table table-striped table-secondary">
                <tr>
                    <td>Kode IT</td>
                    <td>:</td>
                    <td>{{ $data->kd_it }}</td>
                </tr>
                <tr>
                    <td>Kode Asset</td>
                    <td>:</td>
                    <td>{{ $data->kd_asset }}</td>
                </tr>
                <tr>
                    <td>Dept</td>
                    <td>:</td>
                    <td>{{ $data->dept }}</td>
                </tr>
                <tr>
                    <td>PC/NB</td>
                    <td>:</td>
                    <td>{{ $data->jenis }}</td>
                </tr>
                <tr>
                    <td>PIC</td>
                    <td>:</td>
                    <td>{{ $data->pic }}</td>
                </tr>
                <tr>
                    <td>Manufacture</td>
                    <td>:</td>
                    <td>{{ $data->merek }}</td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td>:</td>
                    <td>{{ $data->model }}</td>
                </tr>
                <tr>
                    <td>Purchased On (Year)</td>
                    <td>:</td>
                    <td>{{ $data->tahun_beli }}</td>
                </tr>             
            </table>
        </div>
    </div>
    <div class="rows">
        <div class="col-12 border">
            <!-- Log Maintenance -->
            <h2 class="ms-3 mt-2">Log Maintenance</h2>

            <!-- Modal Tambah Data Maintenance -->
            @auth
            <a href="" class="btn btn-primary ms-3 my-2" data-toggle="modal"
                data-target="#modal">Input Data Maintenance</a>
            @endauth
            
            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Maintenance</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                            <form action="{{ route('create') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="kd_it">Kode IT</label>
                                    <input type="text" required="required" name="kd_it" class="form-control" value="{{ $data->kd_it }}" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="tgl">Tanggal</label>
                                    <input type="date" required="required" name="tgl" class="form-control" value="{{ date('Y-m-d') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="pic">PIC</label>
                                    <!-- default user input adalah user login sesuai authentikasi -->
                                    <input type="text" required="required" name="pic" class="form-control" 
                                    @auth
                                    value="{{ Auth::user()->name }}" 
                                    @endauth
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="kondisi">Kondisi</label>
                                    <textarea name="kondisi" required="required" class="form-control"></textarea>
                                </div>
                        </div>
                        <!-- tombol modal tambah -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Data Log Mtc -->
            <table class="table border">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>PIC</th>
                    <th>Kondisi</th>
                    @auth
                    <th colspan='2'>Action</th>
                    @endauth
                </tr>
                <!-- perulangan pemanggilan data maintenance -->
                @foreach($log_mtc as $log)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $log->tgl }}</td>
                    <td>{{ $log->pic }}</td>
                    <td>{{ $log->kondisi }}</td>
                    <td>
                    <!-- Modal Edit data maintenance -->
                    @auth
                    <a href="" class="btn btn-primary" data-toggle="modal"
                        data-target="#modaledit{{ $log->id }}">Update</a>
                    @endauth
                    <div class="modal fade" id="modaledit{{ $log->id }}" tabindex="-1" aria-labelledby="ModalLabelEdit"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabelEdit">Edit Data Maintenance</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body">
                                    <form action="{{ route('edit') }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="{{ $log->id }}" />
                                            <label for="kd_it">Kode IT</label>
                                            <input type="text" required="required" name="kd_it" class="form-control" value="{{ $log->kd_it }}" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl">Tanggal</label>
                                            <input type="date" required="required" name="tgl" class="form-control" value="{{ $log->tgl }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="pic">PIC</label>
                                            <input type="text" required="required" name="pic" class="form-control" value="{{ $log->pic }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="kondisi">Kondisi</label>
                                            <textarea required="required" name="kondisi" class="form-control">{{ $log->kondisi }}</textarea>
                                        </div>
                                </div>
                                <!-- tombol modal edit -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </td>
                    <td>
                        <form method="post" action="{{ route('destroy') }}">
                            @CSRF
                            <input type="hidden" name="id" value="{{ $log->id }}" />
                            @auth
                            <!-- tombol hapus data maintenance -->
                            <button type="submit" class="btn btn-danger">Hapus</button>
                            @endauth
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
 </div>
@endsection