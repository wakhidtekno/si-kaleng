@extends('layouts.app')
@section('title','Ubah Kata Sandi')
@section('page-heading','Ubah Kata Sandi Kaleng')

@section('content')
@if (session()->has('pesan-sukses'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p>{{ session()->get('pesan-sukses') }}</p>
</div>
@endif

@if (session()->has('pesan-error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p>{{ session()->get('pesan-error') }}</p>
</div>
@endif
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{route('update-password')}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="password_lama">Kata Sandi Saat Ini</label>
                        <input type="password" id="password_lama" name="password_lama" class="form-control @error('password_lama') is-invalid @enderror" value="{{old('password_lama')}}">
                        @error('password_lama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_baru">Kata Sandi Baru</label>
                        <div class="input-group">
                            <input type="password" id="password_baru" name="password_baru" class="form-control input-password @error('password_baru') is-invalid @enderror" value="{{old('password_baru')}}">
                            @error('password_baru')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="password_baru_confirmation">Konfirmasi Kata Sandi Baru</label>
                        <input type="password" id="password_baru_confirmation" name="password_baru_confirmation" class="form-control @error('password_baru_confirmation') is-invalid @enderror">
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
