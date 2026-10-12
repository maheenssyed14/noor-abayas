
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed | Noor Abayas</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f5ef;
            color: #29251f;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            width: 100%;
            max-width: 550px;
            background: white;
            padding: 40px 30px;
            border: 1px solid #e8dfd0;
            border-radius: 14px;
            text-align: center;
        }

        .check {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: #edf5e9;
            color: #477744;
            font-size: 38px;
            line-height: 70px;
        }

        h1 {
            margin-bottom: 10px;
        }

        .muted {
            color: #777;
            line-height: 1.6;
        }

        .order-number {
            margin: 25px 0;
            padding: 18px;
            background: #f8f5ef;
            border-radius: 8px;
        }

        .total {
            font-size: 22px;
            font-weight: bold;
            margin: 20px 0;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            padding: 14px 24px;
            border-radius: 6px;
            background: #b18a48;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            background: #96713a;
        }
    </style>
</head>

<body>
    <main class="card">
        <div class="check">✓</div>

        <h1>Thank You for Your Order!</h1>

        <p class="muted">
            Your order has been placed successfully.
            We will contact you to confirm the delivery details.
        </p>

        <div class="order-number">
            <div class="muted">Your Order Number</div>
            <strong>{{ $order->order_number }}</strong>
        </div>

        <p>
            <strong>Customer:</strong>
            {{ $order->customer_name }}
        </p>

        <p>
            <strong>Payment:</strong> Cash on Delivery
        </p>

        <div class="total">
            Total: Rs. {{ number_format((float) $order->total, 2) }}
        </div>

        <a href="{{ url('/') }}">Continue Shopping</a>
    </main>
</body>
</html>
