@extends('backend.v_layouts.app')
@section('content')
<!-- template -->

<h3> {{$judul}} </h3>

<form action="/anggota/{{ $edit->id }}" method="post">
    @method('put')
    @csrf

    <label>Nama</label><br>
    <input type="text" name="nama" id="" value="{{old('nama',$edit->nama)}}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama">
    @error('nama')
    <span class="invalid-feedback alert-danger" role="alert">
        {{$message}}
    </span>
    @enderror
    <p></p>

    <label>HP</label><br>
    <input type="text" name="hp" id="" value="{{old('hp',$edit->hp)}}" class="form-control @error('hp') is-invalid @enderror" placeholder="Masukkan HP">
    @error('hp')
    <span class="invalid-feedback alert-danger" role="alert">
        {{$message}}
    </span>
    @enderror
    <p></p>

    <button type="submit">Perbaharui</button>
</form>

<!-- end template-->
@endsection