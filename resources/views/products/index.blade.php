<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-white shadow px-6 py-4 mb-8">
        <h1 class="text-xl font-bold text-gray-800">Inventory System</h1>
    </nav>
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-700">Products</h2>
            <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Product</a>
        </div>
        <div class="bg-white rounded shadow overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">SKU</th>
                        <th class="px-6 py-3 text-left">Quantity</th>
                        <th class="px-6 py-3 text-left">Threshold</th>
                        <th class="px-6 py-3 text-left">Price</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($products as $product)
                    <tr class="{{ $product->quantity <= $product->low_stock_threshold ? 'bg-red-50' : '' }}">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $product->name }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $product->sku }}</td>
                        <td class="px-6 py-4">
                            <span class="{{ $product->quantity <= $product->low_stock_threshold ? 'text-red-600 font-bold' : 'text-gray-700' }}">
                                {{ $product->quantity }}
                                @if($product->quantity <= $product->low_stock_threshold)
                                    ⚠️ Low Stock
                                @endif
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $product->low_stock_threshold }}</td>
                        <td class="px-6 py-4 text-gray-700">RM{{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:underline mr-3">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>