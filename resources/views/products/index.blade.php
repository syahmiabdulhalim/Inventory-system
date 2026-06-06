<!DOCTYPE html>
<html>
<head>
    <title>Inventory System</title>
</head>
<body>
    <h1>Products</h1>
    <a href="{{ route('products.create') }}">Add Product</a>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>SKU</th>
            <th>Quantity</th>
            <th>Low Stock Threshold</th>
            <th>Price</th>
            <th>Actions</th>
</tr>
        @foreach($products as $product)
        <tr style="{{ $product->quantity <= $product->low_stock_threshold ? 'background:red;color:white' : '' }}">
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->sku }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->low_stock_threshold }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
</body>
</html>