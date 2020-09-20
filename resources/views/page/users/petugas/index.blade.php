@extends('layouts.app')
@section('title','Data Petugas')
@section('page-heading','Data Petugas')

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Petugas</h6>
            </div>

            <div class="card-body">
                    @if (session()->has('pesan'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session()->get('pesan') }}
                    </div>
                @endif
                    <div class="table-responsive">
                        <div class="d-flex justify-content-end">
                            <a href="{{route('petugas.create')}}" class="btn btn-success mb-2"> <i class="fa fa-plus"></i> Tambah</a>
                        </div>
                        <table class="table table-striped" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($petugas as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{route('petugas.edit', $item->id)}}" class="btn btn-info">Edit</a>
                                            <form action="{{route('petugas.destroy', $item->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger ml-2" onclick="return confirm('yakin ingin menghapus ?')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                 <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
            </div>

        </div>
    </div>
</div>
@endsection
