<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <h1>Sửa nhân sự</h1>
  <form action="{{ route('users.addPostUsers')}}" method="post">
    
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Tên nhân viên</label>
    <input type="text" class="form-control" id="" name="nameUser" >
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Email nhân viên</label>
    <input type="text" class="form-control" id="" name="emailUser" >
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Phòng ban nhân viên</label>
    <select name="phongban" id="phongban" class="form-select">
        @foreach($phongban as $value)
         <option value="{{ $value->id}}">{{$value->ten_donvi}}</option>
        @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Tuổi nhân viên</label>
    <input type="text" class="form-control" id="" name="tuoiUser" >
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>