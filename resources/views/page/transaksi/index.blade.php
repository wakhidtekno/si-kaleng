@extends('layouts.app')
@section('title','Laporan Transaksi')
@section('page-heading','Laporan Transaksi')

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
            </div>

            <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTableReport">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Jumlah</th>
                                    <th>Tipe</th>
                                    <th>Saldo</th>
                                    <th>Tanggal</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transaksi as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>Rp {{ number_format($item->jumlah,2,',','.' )}}</td>
                                        <td>
                                        @if ($item->tipe == 'penerimaan')
                                            <span class="badge badge-info">
                                        @else
                                            <span class="badge badge-success">
                                        @endif
                                            {{$item->tipe}}
                                            </span>
                                        </td>
                                        <td>Rp {{ number_format($item->saldo->total,2,',','.' )}}</td>
                                        <td>{{ date('d-m-Y H:m:s',strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->bulan }}</td>
                                        <td>{{ $item->tahun }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Jumlah</th>
                                    <th>Tipe</th>
                                    <th>Saldo</th>
                                    <th>Tanggal</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                </tr>

                            </tfoot>
                        </table>
                    </div>
            </div>

        </div>
    </div>
</div>
@endsection
