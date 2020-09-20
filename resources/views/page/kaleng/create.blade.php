@extends('layouts.app')
@section('title','Tambah kaleng')
@section('page-heading','Tambah Kaleng')

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Registrasi</h6>
            </div>

            <div class="card-body">
                    @if (session()->has('pesan'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session()->get('pesan') }}
                        </div>
                    @endif
                <form action="{{route('kaleng.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="no_register">No Register</label>
                        <input type="text" name="no_register" class="form-control @error('no_register') is-invalid @enderror" id="no_register">
                        @error('no_register')
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
