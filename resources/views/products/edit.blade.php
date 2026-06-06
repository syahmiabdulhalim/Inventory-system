<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
<h1>Edit Product</h1>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
    </div>
    <div>
        <label>Description:</label>
        <input type="text" name="description" value="{{ old('description', $product->description) }}">
    </div>
    <div>
        <label>SKU:</label>
        <input type="text" name="sku" value="{{ old('sku', $product->sku) }}">
    </div>
    <div>
        <label>Quantity:</label>
        <input type="number" name="quantity" value="{{ old('quantity', $product->quantity  ) }}" min="0">
    </div>
    <div>
        <label>Low Stock Threshold:</label>
        <input type="number" name="low_stock_threshold" value="{{ old('low_stock_threshold', $product->low_stock_threshold) }}" min="0">
    </div>
    <div>
        <label>Price:</label>
        <input type="number" name="price" value="{{ old('price', $product->price) }}" step="0.01" min="0">
    </div>
    <button type="submit">Save Product</button>
        <button type="button" onclick="window.location.href='{{ route('products.index') }}'">Cancel</button>

</form>
</body>
</html>
