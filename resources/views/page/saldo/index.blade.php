@extends('layouts.app')
@section('title','Laporan Saldo')
@section('page-heading','Laporan Saldo')

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Saldo</h6>
            </div>

            <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTableReport">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($saldo as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>Rp {{ number_format($item->total,2,',','.' )}}</td>
                                        <td>{{ date('d-m-Y H:m:s',strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->bulan }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>{{ $item->keterangan }}</td>
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
