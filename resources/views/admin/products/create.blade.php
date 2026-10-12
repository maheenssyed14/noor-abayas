
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | Noor Abayas</title>

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
            flex-wrap: wrap;
            gap: 12px;
        }

        nav a {
            color: #f0d6a2;
            text-decoration: none;
            margin-left: 18px;
        }

        .container {
            max-width: 750px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .form-card {
            background: white;
            padding: 30px;
            border: 1px solid #e8dfd0;
            border-radius: 12px;
        }

        label {
            display: block;
            margin: 18px 0 8px;
            font-weight: bold;
            font-size: 14px;
        }

        input, textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d8c9b2;
            border-radius: 6px;
            font: inherit;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .btn {
            margin-top: 22px;
            padding: 13px 20px;
            background: #b18a48;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            background: #96713a;
        }

        .error {
            color: #a12b24;
            font-size: 13px;
            margin-top: 6px;
        }

        .errors {
            padding: 12px;
            background: #fbe7e5;
            border-radius: 6px;
        }

        .muted {
            color: #777;
            font-size: 14px;
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
    <div class="form-card">
        <h1>Add New Product</h1>
        <p class="muted">Add a product to your Noor Abayas store.</p>

        @if ($errors->any())
            <div class="errors">
                @foreach ($errors->all() as $error)
                    <div class="error">{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form
            action="{{ route('admin.products.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <label for="name">Product Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
            >

            <label for="price">Price (PKR)</label>
            <input
                type="number"
                id="price"
                name="price"
                min="1"
                step="0.01"
                value="{{ old('price') }}"
                required
            >

            <label for="stock">Stock Quantity</label>
            <input
                type="number"
                id="stock"
                name="stock"
                min="0"
                value="{{ old('stock', 0) }}"
                required
            >

            <label for="category">Category</label>
            <input
                type="text"
                id="category"
                name="category"
                value="{{ old('category') }}"
                required
            >

            <label for="description">Description</label>
            <textarea
                id="description"
                name="description"
            >{{ old('description') }}</textarea>

            <label for="image">Product Image</label>
            <input
                type="file"
                id="image"
                name="image"
                accept="image/jpeg,image/png,image/webp"
            >

            <button type="submit" class="btn">Save Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn">
                Cancel
            </a>
        </form>
    </div>
</main>
</body>
</html>
