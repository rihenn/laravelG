<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grup Arge · Kullanıcılar</title>
</head>
<body>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
              
                <th scope="col">UID</th>
              
                <th scope="col">User ID</th>
                <th scope="col">Ad Soyad</th>
                <th scope="col">Rol</th>
                <th scope="col">Şifre</th>
                <th scope="col">Kart No</th>
                <th scope="col">Eylemler</th>
            </tr>
        </thead>
        <tbody>
            @php
                $sl = 1;
                $cl=1;
            @endphp
            @foreach ($users as $user)
            <tr>
                <td scope="row">{{ $sl++ }}</td>

              
                <td>{{ $user['uid'] }}</td>
                <td>{{ $user['userid'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['role'] }}</td>
                <td>{{ $user['password'] }}</td>
                <td>{{ $user['cardno'] }}</td>
              </tr>
            @endforeach
         
          
        </tbody>
    </table>
</body>
</html>