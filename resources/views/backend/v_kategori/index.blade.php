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
                                    <th>Nama_Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $index => $row)
                                    <tr>
                                        <td> {{$loop->iteration}} </td>
                                        <td> {{$row->nama_kategori}} </td>
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
@endsection

