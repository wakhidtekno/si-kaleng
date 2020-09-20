@extends('layouts.app')
@section('title','Laporan Penerimaan Infaq')
@section('page-heading','Laporan Penerimaan Infaq')

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
                        <table class="table table-striped" id="dataTableReport">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kaleng</th>
                                    <th>RT</th>
                                    <th>RW</th>
                                    <th>Tanggal Pegambilan</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Petugas</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($penerimaan as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $item->kaleng->no_register }}</td>
                                    <td>{{$item->kaleng->munfik->rt}}</td>
                                    <td>{{$item->kaleng->munfik->rw}}</td>
                                    <td>{{ date('d-m-Y H:i:s',strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->bulan }}</td>
                                    <td>{{ $item->tahun }}</td>
                                    <td>{{ $item->petugas }}</td>
                                    <td>Rp {{ number_format($item->jumlah,2,',','.' )}}</td>
                                </tr>
                                @empty
                                 <tr>
                                    <td colspan="9" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Kaleng</th>
                                    <th>RT</th>
                                    <th>RW</th>
                                    <th>Tanggal Pegambilan</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Petugas</th>
                                    <th>Jumlah</th>
                                </tr>

                            </tfoot>
                        </table>
                    </div>
            </div>

        </div>
    </div>
</div>
@endsection
