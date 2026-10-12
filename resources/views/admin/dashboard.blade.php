
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Noor Abayas</title>

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
            gap: 15px;
        }

        .logo {
            font-size: 23px;
            font-weight: bold;
            letter-spacing: 3px;
        }

        nav a {
            color: #f0d6a2;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
        }
nav form {
    display: inline-block;
    margin-left: 20px;
}

nav button {
    background: #b18a48;
    color: white;
    border: none;
    padding: 10px 14px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
}
        .container {
            max-width: 1150px;
            margin: 40px auto;
            padding: 0 22px;
        }

        .heading {
            margin-bottom: 28px;
        }

        .heading h1 {
            margin-bottom: 8px;
            font-size: 30px;
        }

        .muted {
            color: #777;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border: 1px solid #e8dfd0;
            border-radius: 12px;
        }

        .card p {
            color: #777;
            font-size: 14px;
            margin: 0 0 15px;
        }

        .number {
            font-size: 30px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .section {
            margin-top: 30px;
            background: white;
            padding: 25px;
            border: 1px solid #e8dfd0;
            border-radius: 12px;
        }

        .section h2 {
            margin-top: 0;
        }

        .links {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn {
            display: inline-block;
            padding: 13px 18px;
            background: #b18a48;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn:hover {
            background: #96713a;
        }

        @media (max-width: 900px) {
            .cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 500px) {
            .cards {
                grid-template-columns: 1fr;
            }

            .heading h1 {
                font-size: 25px;
            }

            nav a {
                margin-left: 0;
                margin-right: 15px;
            }
        }
    </style>
</head>



<body>
    <nav>
        <div class="logo">NOOR. <span style="font-size:12px; letter-spacing:1px;">ADMIN</span></div>

      
<div>
    <a href="{{ url('/') }}">View Store</a>
    <a href="{{ route('cart.index') }}">Cart</a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Log Out</button>
    </form>
</div>

    </nav>

    <main class="container">
        <div class="heading">
            <h1>Admin Dashboard</h1>
            <p class="muted">Overview of your Noor Abayas store.</p>
        </div>

        <div class="cards">
            <div class="card">
                <p>Total Products</p>
                <div class="number">{{ $totalProducts }}</div>
            </div>

            <div class="card">
                <p>Total Orders</p>
                <div class="number">{{ $totalOrders }}</div>
            </div>

            <div class="card">
                <p>Pending Orders</p>
                <div class="number">{{ $pendingOrders }}</div>
            </div>

            <div class="card">
                <p>Total Sales</p>
                <div class="number">
                    Rs. {{ number_format($totalSales, 0) }}
                </div>
            </div>
        </div>

        <section class="section">
            <h2>Store Management</h2>
            <p class="muted">
                Use these sections to manage your store as we build them.
            </p>

            <div class="links">
                <a href="{{ route('admin.products.index') }}" class="btn">
    Manage Products
</a>
                <a href="{{ route('admin.orders.index') }}" class="btn">
    Manage Orders
</a>
            </div>
        </section>
    </main>
</body>
</html>
