
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details | Noor Abayas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #faf7f0;
            color: #33291d;
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 1000px;
            margin: auto;
        }
        .card {
            background: white;
            border: 1px solid #e7d8b5;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 20px;
        }
        h1, h2 {
            color: #9b783b;
        }
        .details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
        }
        .label {
            color: #776b5a;
            font-size: 13px;
            margin-bottom: 5px;
        }
        .value {
            font-weight: bold;
            overflow-wrap: anywhere;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee4d2;
        }
        th {
            background: #f6efdf;
        }
        .total {
            text-align: right;
            margin-top: 20px;
            line-height: 1.9;
        }
        .btn {
            display: inline-block;
            background: #b08d45;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
        }
        .table-wrap {
            overflow-x: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <p>
        <a href="{{ route('admin.orders.index') }}" class="btn">
            ← Back to Orders
        </a>
    </p>

    <h1>Order Details</h1>

    <div class="card">
        <h2>Order Information</h2>

        <div class="details">
            <div>
                <div class="label">Order Number</div>
                <div class="value">{{ $order->order_number }}</div>
            </div>
            <div>
                <div class="label">Order Date</div>
                <div class="value">{{ $order->created_at?->format('d M Y, h:i A') }}</div>
            </div>
            <div>
                <div class="label">Status</div>
                <div class="value">{{ ucfirst($order->status) }}</div>
            </div>
            <div>
                <div class="label">Payment Method</div>
                <div class="value">{{ $order->payment_method }}</div>
            </div>
        </div>
    </div>

    <div class="card">
        <h2>Customer Information</h2>

        <div class="details">
            <div>
                <div class="label">Name</div>
                <div class="value">{{ $order->customer_name }}</div>
            </div>
            <div>
                <div class="label">Email</div>
                <div class="value">{{ $order->email }}</div>
            </div>
            <div>
                <div class="label">Phone</div>
                <div class="value">{{ $order->phone }}</div>
            </div>
            <div>
                <div class="label">City</div>
                <div class="value">{{ $order->city }}</div>
            </div>
            <div>
                <div class="label">Address</div>
                <div class="value">{{ $order->address }}</div>
            </div>
        </div>
    </div>

    <div class="card">
        <h2>Ordered Products</h2>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($order->items as $item)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td>Rs. {{ number_format($item->price, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rs. {{ number_format($item->subtotal, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No items found for this order.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="total">
            <div>Subtotal: Rs. {{ number_format($order->subtotal, 2) }}</div>
            <div>Delivery: Rs. {{ number_format($order->delivery_charges, 2) }}</div>
            <strong>Total: Rs. {{ number_format($order->total, 2) }}</strong>
        </div>
    </div>
</div>
</body>
</html>
