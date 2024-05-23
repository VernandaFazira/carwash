@extends('backend.v_layouts.app')

@section('content')
<!-- template -->

<div class="col-lg-6 col-xs-12">
    <div class="box-content card white">
        <div class="card-header">
            <h5 class="card-title" style="font-family: 'Arial', sans-serif; font-weight: bold; font-size: 1.2rem;">Formulir Perubahan Data Kategori</h5>
        </div>
        <div class="card-body">
            <form action="/kategori/{{ $edit->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="" value="{{ old('nama_kategori', $edit->nama_kategori) }}" class="form-control @error('nama_kategori') is-invalid @enderror">
                    @error('nama_kategori')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="foto">Foto</label><br>
                    <input type="file" name="foto" id="foto" value="{{ old('foto', $edit->foto) }}" class="form-control @error('foto') is-invalid @enderror">
                    @if ($edit->foto)
                    
                        <br>
                        <img src="{{ asset('path/to/foto/' . $edit->foto) }}" alt="Foto" style="width: 100px; height: 100px;">
                    @else
                        <p>Tidak ada foto</p>
                    @endif
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Perbaharui</button>
                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.box-content -->
</div>

<!-- end template-->
@endsection
