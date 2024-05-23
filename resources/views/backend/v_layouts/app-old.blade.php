<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>124A</title>
</head>

<body>
    <a href="{{ route('home') }}">Beranda</a> |
    <a href="#">User</a> |
    <a href="{{ route('anggota.index') }}">Anggota</a> |
    <a href="#">Keluar</a>
    <p></p>

    <!-- isi template -->
    @yield('content')
    <!-- end isi template -->
</body>

</html>