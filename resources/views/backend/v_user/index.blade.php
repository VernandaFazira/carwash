@extends('backend.v_layouts.app')
@section('content')
<!-- template -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$judul}}</h4>
                    <a href="/user/create">
                        <button type="button" class="btn btn-primary btn-sm">
                            Tambah
                        </button>
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>HP</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($user as $index => $row)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{$row->nama}} </td>
                    <td> {{$row->hp}} </td>
                    <td>{{$row->email}} </td>
                    <td>
                        <!-- <a href="/user/{{ $row->id }}/edit/">
                            <button type="button">Ubah</button>
                        </a>
                        <form action="/user/{{ $row->id }}" method="POST" style="display: inline-block;">
                            @method('delete')
                            @csrf
                            <button type="submit">Hapus</button>
                        </form> -->
                        <a href="/user/{{ $row->id }}/edit" title="Ubah Data">
                            <span class="label label-primary"><i class="fa fa-edit"></i> Ubah</span>
                        </a>
                        <form method="POST" action="{{ route('user.destroy', $row->id) }}" style="display: inline-block;">
                            @method('delete')
                            @csrf
                            <button type="button" class="label label-danger show_confirm" data-toggle="tooltip" title='Hapus Data' data-konf-delete="{{ $row->nama }}"><i class="fa fa-trash"></i>Hapus</button></button>
                        </form>
                        <!-- |
                            <a href="#" title="Ubah Data">
                                <span class="badge bg-primary">
                                    <i class="fa fa-edit"></i>Ubah 2</span>
                            </a>
                            |
                            <a href="#" title="Ubah Data">
                                <span class="badge bg-primary">
                                    <i class="bi bi-pencil-square"></i> Ubah 3</span>
                            </a>
                            <a href="#" title="Hapus Data">
                                <span class="badge bg-danger"><i class="bi bi-trash"></i> Hapus 3</span>
                            </a>
                            |
                            <a href="#" title="Ubah Data">
                                <span class="badge badge-primary"><i class="fa fa-edit"></i> Ubah 4</span>
                            </a>
                            <a href="#" title="Hapus Data">
                                <span class="badge badge-danger"><i class="fa fa-trash"></i> Hapus 4</span>
                            </a> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- end template-->
@endsection