@extends('layouts.app')
@section('title','Data Munfik')
@section('page-heading','Data Munfik')

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Munfik</h6>
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
                            <a href="{{route('munfik.create')}}" class="btn btn-success mb-2"> <i class="fa fa-plus"></i> Tambah</a>
                        </div>
                        <table class="table table-striped" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>RT</th>
                                    <th>RW</th>
                                    <th>No Register Kaleng</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($munfik as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->rt }}</td>
                                    <td>{{ $item->rw }}</td>
                                    <td>{{ $item->kaleng->no_register }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{route('munfik.edit', $item->id)}}" class="btn btn-info">Edit</a>
                                            <form action="{{route('munfik.destroy', $item->id)}}" method="post">
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
