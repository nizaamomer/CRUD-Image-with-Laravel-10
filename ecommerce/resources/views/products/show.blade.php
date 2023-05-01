
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div>
<h1>{{ $product->name }}</h1>
   <p>{{ $product->price }}</p>
    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="100px"> <br><br>
    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success">Edit</a> <br>
    <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger">Delete</a>
</div>