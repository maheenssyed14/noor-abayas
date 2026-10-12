
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products | Noor Abayas</title>

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

        nav a:hover {
            color: white;
        }

        .container {
            max-width: 1250px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .muted {
            color: #777;
            line-height: 1.6;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .page-header h1 {
            margin-bottom: 5px;
        }

        .btn {
            display: inline-block;
            padding: 11px 16px;
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

        .success {
            background: #e8f5e9;
            color: #256029;
            border: 1px solid #c8e6c9;
            padding: 14px 16px;
            border-radius: 7px;
            margin-top: 20px;
        }

        .table-wrap {
            margin-top: 25px;
            background: white;
            border: 1px solid #e8dfd0;
            border-radius: 10px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 750px;
            border-collapse: collapse;
        }

        th, td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #eee7dc;
        }

        th {
            background: #eee6d8;
            font-size: 13px;
        }

        td {
            font-size: 14px;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #fdfbf7;
        }

        .empty {
            padding: 30px;
            text-align: center;
            color: #777;
        }

        .bottom-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        @media (max-width: 600px) {
            nav {
                padding: 18px 5%;
            }

            nav a {
                margin-left: 0;
                margin-right: 15px;
            }

            .container {
                margin-top: 25px;
                padding: 0 15px;
            }

            .page-header {
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

<nav>
    <strong>NOOR. ADMIN</strong>

    <div>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.orders.index') }}">Orders</a>
        <a href="{{ url('/') }}">View Store</a>
    </div>
</nav>

<main class="container">

    <div class="page-header">
        <div>
            <h1>Manage Products</h1>
            <p class="muted">
                View and manage the products currently listed in your store.
            </p>
        </div>

        <a href="{{ route('admin.products.create') }}" class="btn">
            + Add New Product
        </a>
    </div>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>

                        <td>
                            <strong>{{ $product->name }}</strong>
                        </td>

                        <td>
                            Rs. {{ number_format($product->price, 0) }}
                        </td>

                        <td>{{ $product->stock }}</td>

                        <td>{{ $product->category }}</td>

<td>
    <div style="display:flex; gap:8px; align-items:center;">
        <a href="{{ route('admin.products.edit', $product) }}"
           class="btn">
            Edit
        </a>

        <form action="{{ route('admin.products.destroy', $product) }}"
              method="POST"
              onsubmit="return confirm('Are you sure you want to delete this product?');">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="btn"
                    style="background:#a83e35;">
                Delete
            </button>
        </form>
    </div>
</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty">
                            No products found. Add your first product!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="bottom-actions">
        <a href="{{ route('admin.dashboard') }}" class="btn">
            Back to Dashboard
        </a>

        <a href="{{ url('/') }}" class="btn">
            View Store
        </a>
    </div>

</main>

</body>
</html>
