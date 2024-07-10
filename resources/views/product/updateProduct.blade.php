<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <h1>Sửa sản phẩm</h1>
  <form action="{{ route('product.updatePostProduct')}}" method="post">
    
    @csrf
    <input type="hidden" name="id" value="{{$product->id}}">
  <div class="mb-3">
    <label for="" class="form-label">Tên sản phẩm</label>
    <input type="text" class="form-control" id="" name="name" value="{{ $product->name}}" >
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Danh mục sản phẩm</label>
    <select name="category" id="category" class="form-select">
        @foreach($category as $value)
         <option
         @if( $product->category_id === $value->id)
            selected
          @endif
           value="{{ $value->id}}">{{$value->name_dm}}</option>
        @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Giá sản phẩm</label>
    <input type="text" class="form-control" id="" name="price" value="{{ $product->price}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">View</label>
    <input type="text" class="form-control" id="" name="view" value="{{ $product->price}}" >
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>