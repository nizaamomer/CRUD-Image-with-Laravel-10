
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<form action="{{ route('products.update', $product->id) }}" 
    method="post" enctype="multipart/form-data">
    <h1>Edit Product</h1>
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
    <label for="price">price</label>
    <input type="text" name="price" id="" value="{{ $product->price }}">
    <label for="image">Old Image</label><br>
    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="100px" >
    <label for="image">New Image</label>
    <input type="file" class="form-control" id="image" name="image">
    <input type="hidden" name="oldImage" value="{{ $product->image }}">
    <button type="submit" class="btn btn-primary">Update Product</button>
</form>




