@extends('layouts.app')
@section('title','Edit kaleng')
@section('page-heading','Edit Kaleng')

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Kaleng</h6>
            </div>

            <div class="card-body">
                    @if (session()->has('pesan'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session()->get('pesan') }}
                    </div>
                @endif
                <form action="{{route('kaleng.update', $kaleng->id)}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="no_register">No Register</label>
                        <input type="text" name="no_register" class="form-control @error('no_register') is-invalid @enderror" id="no_register" value="{{$kaleng->no_register ?? old('no_register')}}">
                        @error('no_register')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
