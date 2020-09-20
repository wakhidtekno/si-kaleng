@extends('layouts.app')
@section('title','Data Penerimaan Infaq')
@section('page-heading','Data Penerimaan Infaq')

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Penerimaan</h6>
            </div>

            <div class="card-body">
                    @if (session()->has('pesan'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session()->get('pesan') }}
                    </div>
                @endif
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kaleng</th>
                                    <th>Tanggal Pegambilan</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Petugas</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    @if (Auth::user()->level == '0')
                                    <th>Tindakan</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($penerimaan as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $item->kaleng->no_register }}</td>
                                    <td>{{ date('d-m-Y H:i:s',strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->bulan }}</td>
                                    <td>{{ $item->tahun }}</td>
                                    <td>{{ $item->petugas }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    @if (Auth::user()->level == '0')
                                    <td>
                                        @if ($item->status == 'menunggu konfirmasi')
                                        <span class="badge badge-warning">
                                        @else
                                        <span class="badge badge-success">
                                        @endif
                                        {{ $item->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if ($item->status == 'menunggu konfirmasi')
                                            <form action="{{route('penerimaan.konfirmasi', $item->id)}}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-success mr-2" onclick="return confirm('yakin ingin mengkonfirmasi ?')">Konfirmasi</button>
                                            </form>
                                            <a href="{{route('penerimaan.edit', $item->id)}}" class="btn btn-info">Edit</a>
                                            <form action="{{route('penerimaan.destroy', $item->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger ml-2" onclick="return confirm('yakin ingin menghapus ?')">Hapus</button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                                @empty
                                 <tr>
                                    <td colspan="9" class="text-center">Tidak ada data</td>
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
