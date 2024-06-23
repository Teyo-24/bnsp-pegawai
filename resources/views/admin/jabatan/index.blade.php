@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data jabatan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">jabatan</li>
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
                        <a href="{{ route('jabatan.create') }}"><button class="btn btn-primary">Tambah jabatan</button></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="w-50">Jabatan</th>
                                    <th>Dibuat pada</th>
                                    <th class="w-25">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jabatan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->jabatan }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a class="btn btn-warning btn-sm py-2 mr-2"
                                                    href="{{ route('jabatan.show', $item->id) }}">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                                <a class="btn btn-info btn-sm py-2 mr-2"
                                                    href="{{ route('jabatan.edit', $item->id) }}">
                                                    <i class="fas fa-pencil-alt"></i> Edit
                                                </a>
                                                <form action="{{ route('jabatan.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="return confirmdelete()" type="submit"
                                                        class="btn btn-danger btn-sm py-2">
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
