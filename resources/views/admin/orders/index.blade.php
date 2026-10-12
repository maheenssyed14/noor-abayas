
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders | Noor Abayas</title>

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
            max-width: 1400px;
            margin: 40px auto;
            padding: 0 20px;
        }

        h1 {
            margin-bottom: 8px;
        }

        .muted {
            color: #777;
        }

        .message {
            padding: 14px 18px;
            border-radius: 7px;
            margin-top: 20px;
        }

        .success {
            background: #e4f4e8;
            color: #236536;
        }

        .error {
            background: #fbe7e5;
            color: #a12b24;
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
            border-collapse: collapse;
            min-width: 1050px;
        }

        th, td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #eee7dc;
            vertical-align: top;
        }

        th {
            background: #eee6d8;
            font-size: 13px;
        }

        td {
            font-size: 14px;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #f2eadb;
            color: #765a2e;
            font-size: 12px;
            text-transform: capitalize;
        }

        .status-form {
            min-width: 170px;
        }

        select {
            width: 100%;
            padding: 9px;
            margin-bottom: 8px;
            border: 1px solid #d8c9b2;
            border-radius: 5px;
            background: white;
        }

        button, .btn {
            display: inline-block;
            padding: 11px 15px;
            background: #b18a48;
            color: white;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px;
        }

        button:hover, .btn:hover {
            background: #96713a;
        }

        .back-btn {
            margin-top: 20px;
        }

        .empty {
            text-align: center;
            padding: 35px;
        }
    </style>
</head>

<body>

<nav>
    <strong>NOOR. ADMIN</strong>

    <div>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ url('/') }}">View Store</a>
    </div>
</nav>

<main class="container">
    <h1>Customer Orders</h1>
    <p class="muted">View and manage orders placed through your store.</p>

    @if (session('success'))
        <div class="message success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="message error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Customer</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Current Status</th>
                    <th>Update Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td>
                            <strong>{{ $order->order_number }}</strong>
                        </td>

                        <td>
                            {{ $order->customer_name }}<br>
                            <span class="muted">{{ $order->phone }}</span><br>
                            <span class="muted">{{ $order->city }}</span>
                        </td>

                        <td>
                            @foreach ($order->items as $item)
                                <div>
                                    {{ $item->product_name }}
                                    × {{ $item->quantity }}
                                </div>
                            @endforeach
                        </td>

                        <td>
                            Rs. {{ number_format($order->total, 0) }}
                        </td>

                        <td>
                            {{ strtoupper($order->payment_method) }}
                        </td>

                        <td>
                            <span class="status">
                                {{ $order->status }}
                            </span>
                        </td>

                        <td>
                            <form
                                action="{{ route('admin.orders.updateStatus', $order) }}"
                                method="POST"
                                class="status-form"
                            >
                                @csrf
                                @method('PATCH')

                                <select name="status" required>
                                    @foreach ([
                                        'pending',
                                        'confirmed',
                                        'processing',
                                        'shipped',
                                        'delivered',
                                        'cancelled'
                                    ] as $status)
                                        <option
                                            value="{{ $status }}"
                                            {{ $order->status === $status ? 'selected' : '' }}
                                        >
                                            {{ ucfirst($status) }}
                                        </option>
                                    @endforeach
                                </select>

                                <button type="submit">
                                    Update Status
                                </button>
                            </form>
                        </td>

                        <td>
                            {{ $order->created_at->format('d M Y, h:i A') }}
                        </td>
                        <td>
    <a href="{{ route('admin.orders.show', $order) }}" class="btn">
        View Details
    </a>
</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="empty">
                            No orders have been placed yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="btn back-btn">
        Back to Dashboard
    </a>
</main>

</body>
</html>
