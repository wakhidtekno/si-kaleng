@extends('layouts.app')
@section('title','Laporan Penyaluran Infaq')
@section('page-heading','Laporan Penyaluran Infaq')

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Penyaluran</h6>
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
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Keperluan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($penyaluran as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>Rp {{ number_format($item->jumlah,2,',','.' )}}</td>
                                    <td>{{ date('d-m-Y H:i:s',strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->bulan }}</td>
                                    <td>{{ $item->tahun }}</td>
                                    <td>{{ $item->keperluan }}</td>
                                </tr>
                                @empty
                                 <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Keperluan</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
            </div>

        </div>
    </div>
</div>
@endsection
