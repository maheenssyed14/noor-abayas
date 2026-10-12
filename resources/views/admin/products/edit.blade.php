
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product | Noor Abayas</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f5ef;
            color: #29251f;
        }

        nav {
            background: #29251f;
            color: white;
            padding: 22px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        nav a {
            color: #f0d6a2;
            text-decoration: none;
            margin-left: 20px;
        }

        .container {
            max-width: 750px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border: 1px solid #e8dfd0;
            border-radius: 12px;
        }

        .field {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 14px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd2bf;
            border-radius: 6px;
            font-size: 15px;
            font-family: inherit;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            background: #b18a48;
            color: white;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background: #96713a;
        }

        .cancel {
            background: #6b6257;
        }

        .error {
            color: #a83e35;
            font-size: 13px;
            margin-top: 5px;
        }

        .current-image {
            max-width: 150px;
            max-height: 150px;
            object-fit: cover;
            display: block;
            margin: 10px 0;
            border-radius: 8px;
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>
<nav>
    <strong>NOOR. ADMIN</strong>

    <div>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.products.index') }}">Products</a>
    </div>
</nav>

<main class="container">
    <h1>Edit Product</h1>
    <p>Update the details of your selected product.</p>

    <div class="card">
        <form action="{{ route('admin.products.update', $product) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="field">
                <label for="name">Product Name</label>
                <input id="name" type="text" name="name"
                       value="{{ old('name', $product->name) }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="price">Price (PKR)</label>
                <input id="price" type="number" name="price"
                       min="1" step="0.01"
                       value="{{ old('price', $product->price) }}" required>
                @error('price')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="stock">Stock Quantity</label>
                <input id="stock" type="number" name="stock"
                       min="0"
                       value="{{ old('stock', $product->stock) }}" required>
                @error('stock')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="category">Category</label>
                <input id="category" type="text" name="category"
                       value="{{ old('category', $product->category) }}" required>
                @error('category')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label>Current Image</label>

              
@if ($product->image)
    <div style="margin-bottom: 15px;">
        <p>Current Image:</p>
        <img
            src="{{ asset('storage/' . $product->image) }}"
            alt="{{ $product->name }}"
            style="width: 120px; height: 120px; object-fit: cover; border-radius: 8px;"
        >
    </div>
@endif

            </div>

            <div class="field">
                <label for="image">Replace Image (optional)</label>
                <input id="image" type="file" name="image"
                       accept=".jpg,.jpeg,.png,.webp">
                <small>Leave empty to keep the current image.</small>
                @error('image')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="actions">
                <button type="submit" class="btn">Update Product</button>

                <a href="{{ route('admin.products.index') }}"
                   class="btn cancel">Cancel</a>
            </div>
        </form>
    </div>
</main>
</body>
</html>
