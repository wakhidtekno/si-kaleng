@extends('layouts.app')
@section('title','Tambah Munfiq')
@section('page-heading','Tambah Munfiq')

@section('content')
<div class="row">
    <div class="col">
        <div class="col mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Informasi</div>
                            <div class="h5 mb-0">Setiap Munfiq hanya bisa memiliki 1 kaleng infaq, jika kaleng infaq tidak ada data silahkan tambahkan data kaleng baru terlebih dahulu</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Munfiq</h6>
            </div>
            <div class="card-body">
                    @if (session()->has('pesan'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session()->get('pesan') }}
                    </div>
                @endif
                <form action="{{route('munfik.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{old('nama')}}">
                        @error('nama')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="text" name="rt" class="form-control @error('rt') is-invalid @enderror" id="rt" value="{{old('rt')}}">
                        @error('rt')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input type="text" name="rw" class="form-control @error('rw') is-invalid @enderror" id="rw" value="{{old('rw')}}">
                        @error('rw')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kaleng_id">No Register Kaleng</label>
                        <select class="form-control" id="kaleng_id" name="kaleng_id">
                            @forelse ($kaleng as $item)
                                <option value="{{$item->id}}">{{ $item->no_register }}</option>
                            @empty
                                <option value="">tidak ada data</option>
                            @endforelse
                        </select>
                        @error('kaleng_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror

                      </div>
                    <button type="submit" class="btn btn-success">Kirim</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
