@extends('layouts.main')

@section('content')
    <div id="body-lapor">
        <div class="jumbotron jumbotron-fluid mt-5">
            <div class=" container">
                <h3 class="display-4">Punya keluhan terkait PC Anda?
                </h3>
                <p class="lead">Silakan isi form di bawah ini agar segera kami proses</p>
            </div>
        </div>

        <div class="container mt-5" style="margin-bottom: 3%;">
            @if (session()->has('success'))
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            @auth
                <div class="row justify-content-center text-white" id="proses">
                    <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12">
                        <div class="card border-none" style="margin-bottom: 10%;">
                            <h3 class="text-center">Silakan Isi Form di Bawah Ini</h3>
                            <form class="mt-4 mx-3 my-3" action="{{ url('lapor') }}" method="post">
                                @csrf
                                <input type="hidden" name="id_perbaikan" value="">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                            id="staticEmail" value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">No. Handphone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('handphone') is-invalid @enderror"
                                            name="handphone" id="staticEmail" value="{{ old('handphone') }}">
                                        @error('handphone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Kategori Kerusakan</label>
                                    <div class="col-sm-9">
                                        <select name="category_id" class="custom-select">
                                            @forelse ($categories as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                            @empty
                                                <option value="" selected>Tidak ada kategori kerusakan</option>
                                            @endforelse
                                        </select>
                                        @error('kategori')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Detail Kerusakan</label>
                                    <div class="col-sm-9">
                                        <textarea rows="7" class="form-control @error('detail') is-invalid @enderror"
                                            name="detail">{{ old('detail') }}</textarea>
                                        @error('detail')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <h5 class="text-center" style="margin-bottom: 10%">Silakan <a href="{{ url('login') }}"
                        class="text-decoration-none text-danger">Login</a>
                    Terlebih Dahulu Untuk Mengakses Form!</h5>
            @endauth
        </div>
    </div>
@endsection