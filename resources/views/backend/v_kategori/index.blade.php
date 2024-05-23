@extends('backend.v_layouts.app')
@section('content')
<!-- template -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$judul}}</h4>
                    <a href="/kategori/create">
                        <button type="button" class="btn btn-primary btn-sm">
                            Tambah
                        </button>
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Foto</th> <!-- Tambahkan header kolom Foto -->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $index => $row)
                                    <tr>
                                        <td> {{$loop->iteration}} </td>
                                        <td> {{$row->nama_kategori}} </td>
                                        <td>
                                            @if ($row->foto)
                                                <img src="{{ asset('path/to/foto/' . $row->foto) }}" alt="Foto Kategori" style="width: 50px; height: 50px;">
                                            @else
                                                Tidak ada foto
                                            @endif
                                        </td>
                                        <td> 
                                            <a href="/kategori/{{ $row->id }}/edit/">
                                                <span class="label label-primary"><i class="fa fa-edit"></i> Ubah</span>
                                            </a>
                                            <a href="{{ route('kategori.destroy', $row->id) }}" title="Hapus Data" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $row->id }}').submit();">
                                                <span class="label label-danger"><i class="fa fa-trash"></i> Hapus</span>
                                            </a>
                                            <!-- Form untuk konfirmasi penghapusan -->
                                            <form id="delete-form-{{ $row->id }}" action="{{ route('kategori.destroy', $row->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- template end-->

<!-- Update Form -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/kategori/edit" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">
                    <label for="edit_nama_kategori">Nama Kategori</label><br>
                    <input type="text" name="edit_nama_kategori" id="edit_nama_kategori">
                    <br><br>
                    <label for="edit_foto">Foto</label><br>
                    <input type="file" name="edit_foto" id="edit_foto" accept="image/*">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Update Form -->

@endsection
