@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Pegawai</h1>
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
            <!-- Default box -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="ml-auto">
                        <a href="{{ route('pegawai.create') }}"><button class="btn btn-primary">Tambah Pegawai</button></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jabatan</th>
                                    {{-- <th>Alamat</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pegawai as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <img alt="Avatar" class="table-avatar"
                                                        src="{{ url('storage/' . $item->image) }}">
                                                </li>
                                            </ul>
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->tanggal_lahir }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->jabatan->jabatan }}</td>
                                        {{-- <td>{{ Str::limit($item->alamat), 70 }}</td> --}}
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a class="btn btn-warning btn-sm py-2 mr-2"
                                                    href="{{ route('pegawai.show', $item->id) }}">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                                <a class="btn btn-info btn-sm py-2 mr-2"
                                                    href="{{ route('pegawai.edit', $item->id) }}">
                                                    <i class="fas fa-pencil-alt"></i> Edit
                                                </a>
                                                <form action="{{ route('pegawai.destroy', $item->id) }}" method="POST"
                                                    onsubmit="confirmDelete(event, this)">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm py-2">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection
