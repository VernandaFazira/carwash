@extends('backend.v_layouts.app')
@section('content')
<!-- template -->

<h3> {{$judul}} </h3>
<a href="/anggota/create">
    <button type="button">Tambah</button>
</a>
<table border="1" width="80%">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>HP</th>
        <th>Aksi</th>
    </tr>
    @foreach ($index as $row)
    <tr>
        <td> {{ $loop->iteration }} </td>
        <td> {{$row->nama}} </td>
        <td> {{$row->hp}} </td>
        <td>
            <a href="/anggota/{{ $row->id }}/edit/">
                <button type="button">Ubah</button>
            </a>
            <form action="/anggota/{{ $row->id }}" method="POST">
                @method('delete')
                @csrf
                <button type="submit">Hapus</button>
            </form>

        </td>
    </tr>
    @endforeach
</table>

<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title"> {{$judul}} </h4>
        <!-- /.box-title -->
        <div class="dropdown js__drop_down">
            <a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
            <ul class="sub-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else there</a></li>
                <li class="split"></li>
                <li><a href="#">Separated link</a></li>
            </ul>
            <!-- /.sub-menu -->
        </div>
        <!-- /.dropdown js__dropdown -->
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($index as $row)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{$row->nama}} </td>
                    <td> {{$row->hp}} </td>
                    <td>
                        <a href="/anggota/{{ $row->id }}/edit/">
                            <button type="button">Ubah</button>
                        </a>
                        <form action="/anggota/{{ $row->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit">Hapus</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-content -->
</div>

<!-- end template-->
@endsection