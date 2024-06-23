@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Pegawai</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pegawai</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Pegawai</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group text-center">
                                {{-- <label for="image">Gambar</label> --}}
                                @if ($pegawai->image)
                                    <img src="{{ asset('storage/' . $pegawai->image) }}" alt="Gambar" width="200"
                                        class="mt-3">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="text" id="email" class="form-control" name="email"
                                    value="{{ $pegawai->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    value="{{ $pegawai->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir"
                                    value="{{ $pegawai->tanggal_lahir }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <input type="text" id="tanggal_lahir" class="form-control" name="tanggal_lahir"
                                    value="{{ $pegawai->jenis_kelamin }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" id="jabatan" class="form-control" name="jabatan"
                                    value="{{ $pegawai->jabatan->jabatan }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea id="alamat" class="form-control" name="alamat" readonly>{{ $pegawai->alamat }}</textarea>
                            </div>
                            <a href="{{ route('pegawai.index') }}"><button class="btn btn-primary">Back</button></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
