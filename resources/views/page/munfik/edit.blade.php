@extends('layouts.app')
@section('title','Ubah Munfiq')
@section('page-heading','Ubah Munfiq')

@section('content')
<div class="row">
    <div class="col">
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
                <form action="{{route('munfik.update', $munfik->id)}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{$munfik->nama ?? old('nama')}}">
                        @error('nama')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="text" name="rt" class="form-control @error('rt') is-invalid @enderror" id="rt" value="{{$munfik->rt ?? old('rt')}}">
                        @error('rt')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input type="text" name="rw" class="form-control @error('rw') is-invalid @enderror" id="rw" value="{{$munfik->rw ?? old('rw')}}">
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
                                <option value="{{$item->id}}" {{(old('kaleng_id') ?? $item->id) == $munfik->kaleng_id ? 'selected' : '' }}>{{ $item->no_register }}</option>
                            @empty
                                <option value="">tidak ada data</option>
                            @endforelse
                        </select>
                      </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
