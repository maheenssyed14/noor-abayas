
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Noor Abayas</title>

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
            background: #fff;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e8dfd0;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
            letter-spacing: 3px;
        }

        nav a {
            color: #29251f;
            text-decoration: none;
        }

        .container {
            max-width: 1100px;
            margin: 45px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 30px;
        }

        .panel {
            background: white;
            padding: 30px;
            border: 1px solid #e8dfd0;
            border-radius: 12px;
        }

        h1, h2 {
            margin-top: 0;
        }

        label {
            display: block;
            margin: 18px 0 7px;
            font-size: 14px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 13px;
            border: 1px solid #ddd3c4;
            border-radius: 6px;
            font: inherit;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        select {
            width: 100%;
            padding: 13px;
            border: 1px solid #ddd3c4;
            border-radius: 6px;
            background: white;
            font: inherit;
        }

        .item {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: 15px 0;
            border-bottom: 1px solid #eee7dd;
        }

        .muted {
            color: #777;
            font-size: 14px;
        }

        .total {
            display: flex;
            justify-content: space-between;
            font-size: 19px;
            font-weight: bold;
            margin-top: 22px;
        }

        .btn {
            display: block;
            width: 100%;
            margin-top: 25px;
            padding: 15px;
            border: none;
            border-radius: 6px;
            background: #b18a48;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            background: #96713a;
        }

        .error {
            color: #b42318;
            font-size: 13px;
            margin-top: 5px;
        }

        @media (max-width: 750px) {
            .container {
                grid-template-columns: 1fr;
                margin: 25px auto;
            }

            .panel {
                padding: 22px;
            }
        }
    </style>
</head>

<body>
    <nav>
        <div class="logo">NOOR.</div>
        <a href="{{ route('cart.index') }}">← Back to Cart</a>
    </nav>

    <main class="container">
        <section class="panel">
            <h1>Checkout</h1>
            <p class="muted">Enter your details to place your order.</p>

            @if ($errors->any())
                <div class="error">
                    Please correct the highlighted form errors.
                </div>
            @endif

            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf

                <label for="customer_name">Full Name</label>
                <input
                    id="customer_name"
                    type="text"
                    name="customer_name"
                    value="{{ old('customer_name') }}"
                    maxlength="255"
                    autocomplete="name"
                    required
                >
                @error('customer_name')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="email">Email Address</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    maxlength="255"
                    autocomplete="email"
                    required
                >
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="phone">Phone Number</label>
                <input
                    id="phone"
                    type="tel"
                    name="phone"
                    value="{{ old('phone') }}"
                    maxlength="30"
                    autocomplete="tel"
                    required
                >
                @error('phone')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="address">Full Delivery Address</label>
                <textarea
                    id="address"
                    name="address"
                    maxlength="2000"
                    autocomplete="street-address"
                    required
                >{{ old('address') }}</textarea>
                @error('address')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="city">City</label>
                <input
                    id="city"
                    type="text"
                    name="city"
                    value="{{ old('city') }}"
                    maxlength="255"
                    autocomplete="address-level2"
                    required
                >
                @error('city')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="payment_method">Payment Method</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="cod"
                        {{ old('payment_method', 'cod') === 'cod' ? 'selected' : '' }}>
                        Cash on Delivery
                    </option>
                </select>

                <button type="submit" class="btn">Place Order</button>
            </form>
        </section>

        <aside class="panel">
            <h2>Your Order</h2>

            @foreach ($items as $item)
                <div class="item">
                    <div>
                        <strong>{{ $item['name'] }}</strong>
                        <div class="muted">
                            Quantity: {{ $item['quantity'] }}
                        </div>
                    </div>

                    <strong>
                        Rs. {{ number_format($item['subtotal'], 2) }}
                    </strong>
                </div>
            @endforeach

            <div class="total">
                <span>Total</span>
                <span>Rs. {{ number_format($total, 2) }}</span>
            </div>

            <p class="muted">
                Delivery charges, if any, will be confirmed by the store.
            </p>
        </aside>
    </main>
</body>
</html>
