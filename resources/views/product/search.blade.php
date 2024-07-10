

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">
    <h1>Danh sách</h1>
    <div class="d-flex justify-content-between mb-3">
        <form action="{{ route('product.search') }}" method="GET" class="d-flex">
            <input type="text" name="query" class="form-control me-2" placeholder="Tìm kiếm sản phẩm">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>
        <a class="btn btn-success" href="{{ route('product.addProduct') }}">Thêm mới</a>
    </div>
    <div class="container mt-4">
        <h1>Kết quả tìm kiếm cho: "{{ $query }}"</h1>

        @if($listProduct->isEmpty())
            <p>Không tìm thấy sản phẩm nào.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Price</th>
                        <th scope="col">View</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listProduct as $pro)
                        <tr>
                            <th scope="row">{{ $pro->id }}</th>
                            <td>{{$pro->name}}</td>
                            <td>{{$pro->name_dm}}</td>
                            <td>{{$pro->price}}</td>
                            <td>{{$pro->view}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('product.updateProduct', $pro->id )}}">Sửa</a>
                                <a class="btn btn-danger" href="{{ route('product.deleteProduct', $pro->id )}}" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

