<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<table class="table">
    <thead>
        <h1>Products</h1>
        <tr>
            <h3>
                <a href="{{ route('products.create') }}">Craete Product</a>
            </h3>
        </tr>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="100px">
                </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger">Delete</a>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-success">Show</a>
                </td>
            </tr>
        @endforeach
    
    </tbody>
</table>
