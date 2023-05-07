<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<h1>Create Product</h1>
<form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name">

    <br>
    <label for="price">price</label>
    <input type="text"name="price">
 
    <br>
    <label for="image">Image</label>
    <input type="file" name="image">
    
    <br>
    <button type="submit">Create Product</button>
</form>
