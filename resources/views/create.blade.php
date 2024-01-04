<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <form action="{{route('store')}}" method="post">
        @csrf
        <input type="text" name="nik" placeholder="nik">
        <br> <br>
        <input type="text" name="name" placeholder="nama">
        <br> <br>
        <button type="submit">Add</button>
    </form>
    <br>
     <a href="{{url('/karyawan')}}">
            <button type="submit">kembali ke halaman</button>
     </a>
</body>
</html>