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

                        <label for="nama_kategori">Nama Kategori</label><br>
                        <input type="text" name="nama_kategori" id="nama_kategori">
                        <br><br>

                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button type="button" class="btn btn-primary" onclick="window.history.back()">Kembali</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
