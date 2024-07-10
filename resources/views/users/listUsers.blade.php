<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  
  <table class="table">
  <h1>Danh sách</h1>
  <a class="btn btn-success" href="{{ route('users.addUsers') }}">Thêm mới</a>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phòng ban</th>
      <th scope="col">Hành động</th>
    </tr>
  </thead>
  <tbody>
    @foreach($listUsers as $key=>$user)
        <tr>
        <th scope="row">{{ $key + 1 }}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->ten_donvi}}</td>
        <td>
            <a class="btn btn-warning" href="{{ route('users.updateUsers', $user->id )}}">Sửa</a>
            <a class="btn btn-danger" href="{{ route('users.deleteUsers', $user->id )}}">Xóa</a>
        </td>
        </tr>
    @endforeach
    
  </tbody>
</table>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>