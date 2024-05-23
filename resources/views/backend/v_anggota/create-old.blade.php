@extends('backend.v_layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ $judul }}</div>

                <div class="card-body">
                    <form action="/kategori" method="post">
                        @csrf

                        <label>Nama</label><br>
                        <input type="text" name="nama" id="" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama">
                        @error('nama')
                        <span class="invalid-feedback alert-danger" role="alert">
                            {{$message}}
                        </span>
                        @enderror
                        <p></p>

                        <label>HP</label><br>
                        <input type="text" name="hp" id="" value="{{old('hp')}}" class="form-control @error('hp') is-invalid @enderror" placeholder="Masukkan HP">
                        @error('hp')
                        <span class="invalid-feedback alert-danger" role="alert">
                            {{$message}}
                        </span>
                        @enderror
                        <p></p>

                        <button type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 

