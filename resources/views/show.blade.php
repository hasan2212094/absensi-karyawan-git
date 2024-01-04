<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail</title>
</head>
<body>
    <p>Id : {{$karyawan->id}}</p>
    <p>Nama : {{$karyawan->name}}</p>
    <br>
    @foreach($karyawan->absensi as $absen)
        <p>{{$absen->tanggal}}</p>
    @endforeach
</body>
</html>