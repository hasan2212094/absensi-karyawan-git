<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>karyawan</title>
</head>
<body>
    <a href="{{url('/create')}}">
        <button type="submit">add new</button>
    </a>
    <br>
    <br>
    <table border=1px>
        <tr>
            <th>NIK</th>
            <th>Nama</th>
        </tr>
        @foreach($karyawan as $karya)
            <tr>
                <td>{{$karya->nik}}</td>
                <td>{{$karya->name}}</td>
            </tr>
        @endforeach
    </table>
    <br>
    <a href="{{url('/scan/create')}}">
        <button type="submit">absen masuk</button>
    </a>
    <a href="{{url('/scan/create/pulang')}}">
        <button type="submit">absen pulang</button>
    </a>
</body>
</html>