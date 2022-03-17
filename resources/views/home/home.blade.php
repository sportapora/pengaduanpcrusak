@extends('layouts.main')

@section('content')
    <div id="body-home">
        <div class="jumbotron jumbotron-fluid mt-5">
            <div class="container">
                @if (session()->has('login'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('login') . auth()->user()->name }}!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif (session()->has('logout'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('logout') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <h3 class="display-4">Selamat datang!</h3>
                <p>Situs ini merupakan situs pelaporan kerusakan PC Anda. <br> Halaman ini digunakan untuk mengecek status
                    perbaikan PC Anda.</p>

                <a class="btn btn-primary btn-lg" href="#proses" role="button">Cek Proses Perbaikan PC</a>
            </div>
        </div>

        <div class="container">
            <h3 class="fw-bold text-center mb-3 text-white">Kenapa Pilih Kami?</h3>
            <div class="row justify-content-center">
                <div class="card mr-2 mb-2 card-home" style="width: 16rem;">
                    <img src="{{ url('img/1.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Keunggulan 1</h5>
                        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste nihil
                            labore aperiam.</p>
                        <a href="#" class="btn btn-primary">Learn More...</a>
                    </div>
                </div>
                <div class="card mr-2 mb-2 card-home" style="width: 16rem;">
                    <img src="{{ url('img/2.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Keunggulan 2</h5>
                        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste nihil
                            labore aperiam.</p>
                        <a href="#" class="btn btn-primary">Learn More...</a>
                    </div>
                </div>
                <div class="card mr-2 mb-2 card-home" style="width: 16rem;">
                    <img src="{{ url('img/3.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Keunggulan 3</h5>
                        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste nihil
                            labore aperiam.</p>
                        <a href="#" class="btn btn-primary">Learn More...</a>
                    </div>
                </div>
                <div class="card mr-2 mb-2 card-home" style="width: 16rem;">
                    <img src="{{ url('img/4.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Keunggulan 4</h5>
                        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste nihil
                            labore aperiam.</p>
                        <a href="#" class="btn btn-primary">Learn More...</a>
                    </div>
                </div>
            </div>
            <hr class="w-50 mx-auto my-5" style="border-width: 10px; background-color: white; border-radius: 5px;">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-10 col-sm-12">
                    <div id="proses">
                        <h3 class="text-center mb-4 text-white">Cek Proses Perbaikan PC</h3>
                        @auth
                            <form action="{{ url('/#proses') }}" method="get">
                                @csrf
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label text-white">Masukkan ID</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                placeholder="Masukkan ID Perbaikan PC Anda" name="id_perbaikan"
                                                value="{{ old('id_perbaikan') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-dark" type="submit" id="button-addon2">Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr class="w-100 mx-auto my-4"
                                style="border-width: 10px; background-color: white; border-radius: 5px;">
                            <div class="card border-none" style="margin-bottom: 10%;">
                                @if ($data)
                                    <h4 class="text-center">Proses Perbaikan PC: {{ $data->id_perbaikan }}</h4>
                                    <div class="mx-3 my-3">
                                        <div class=" form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">No</label>
                                            <div class="col-sm-9">
                                                {{ $data->id_perbaikan }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                {{ $data->nama }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">No. HP</label>
                                            <div class="col-sm-9">
                                                {{ $data->handphone }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Kategori</label>
                                            <div class="col-sm-9">
                                                {{ $data->category->name }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Detail</label>
                                            <div class="col-sm-9">
                                                {{ $data->detail }}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <h5 class="text-center">Tidak ada data ditemukan</h5>
                                @endif
                            </div>
                        @else
                            <h5 class="text-center text-white" style="margin-bottom: 10%">Silakan <a
                                    href="{{ url('login') }}" class=text-danger>Login</a>
                                Terlebih Dahulu Untuk Mengecek Proses Perbaikan!</h5>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection