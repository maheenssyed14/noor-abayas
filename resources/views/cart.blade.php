<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f8f5ef">

    <title>Shopping Cart | Noor Abayas</title>

    <style>
        :root {
            --cream: #f8f5ef;
            --white: #fffefa;
            --ink: #25231f;
            --muted: #777168;
            --gold: #b89a68;
            --line: #e8e1d6;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: var(--cream);
            color: var(--ink);
            font-family: Arial, sans-serif;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 22px 8%;
            background: var(--white);
            border-bottom: 1px solid var(--line);
        }

        .logo {
            font-family: Georgia, serif;
            font-size: 27px;
            letter-spacing: 4px;
        }

        a {
            color: var(--ink);
            text-decoration: none;
        }

        .container {
            max-width: 1000px;
            margin: 45px auto;
            padding: 0 20px;
        }

        h1, h2, h3 {
            font-family: Georgia, serif;
            font-weight: normal;
        }

        h1 {
            font-size: clamp(32px, 5vw, 44px);
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #92764c;
        }

        .message {
            padding: 14px;
            margin: 16px 0;
            background: var(--white);
            border: 1px solid var(--line);
        }

        .success {
            color: #246b3c;
        }

        .error {
            color: #963535;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 120px minmax(0, 1fr);
            gap: 22px;
            padding: 22px;
            margin: 18px 0;
            background: var(--white);
            border: 1px solid var(--line);
        }

        .cart-image {
            width: 120px;
            height: 145px;
            object-fit: cover;
            background: #eee5d8;
        }

        .item-details h2 {
            margin-top: 0;
            font-size: 23px;
        }

        .muted {
            color: var(--muted);
            font-size: 14px;
        }

        .quantity-form {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 16px;
        }

        input {
            width: 75px;
            padding: 10px;
            border: 1px solid var(--line);
            background: white;
        }

        .button {
            display: inline-block;
            padding: 12px 17px;
            border: 1px solid var(--gold);
            background: var(--gold);
            color: white;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
        }

        .button:hover {
            background: #92764c;
        }

        .remove-button {
            background: transparent;
            color: #963535;
            border-color: #963535;
        }

        .remove-button:hover {
            background: #963535;
            color: white;
        }

        .summary {
            padding: 25px;
            margin-top: 25px;
            background: var(--white);
            border: 1px solid var(--line);
        }

        .total {
            font-size: 25px;
        }

        .empty-cart {
            padding: 45px 20px;
            text-align: center;
            background: var(--white);
            border: 1px solid var(--line);
        }

        footer {
            margin-top: 60px;
            padding: 30px 15px;
            text-align: center;
            color: var(--muted);
            background: var(--white);
            border-top: 1px solid var(--line);
            font-size: 13px;
        }

        @media (max-width: 520px) {
            nav {
                padding: 18px 5%;
            }

            .logo {
                font-size: 21px;
            }

            .container {
                margin-top: 28px;
                padding: 0 12px;
            }

            .cart-item {
                grid-template-columns: 85px minmax(0, 1fr);
                gap: 14px;
                padding: 13px;
            }

            .cart-image {
                width: 85px;
                height: 115px;
            }

            .item-details h2 {
                font-size: 19px;
            }
        }
    </style>
</head>

<body>
    <nav>
        <a href="{{ url('/') }}" class="logo">NOOR.</a>
        <a href="{{ url('/') }}#collection">Continue Shopping →</a>
    </nav>

    <main class="container">
        <h1>Your Shopping Cart</h1>

        @if (session('success'))
            <div class="message success" role="status">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="message error" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="message error" role="alert">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @forelse ($cart as $id => $item)
            <article class="cart-item">
                @if ($item['image'])
                    <img
                        class="cart-image"
                        src="{{ asset('storage/' . $item['image']) }}"
                        alt="{{ $item['name'] }}"
                    >
                @else
                    <div class="cart-image"></div>
                @endif

                <div class="item-details">
                    <h2>{{ $item['name'] }}</h2>

                    <p class="muted">
                        Price: PKR {{ number_format($item['price'], 2) }}
                    </p>

                    <p class="muted">
                        Available stock: {{ $item['stock'] }}
                    </p>

                    <p>
                        Subtotal:
                        <strong>
                            PKR {{ number_format($item['subtotal'], 2) }}
                        </strong>
                    </p>

                    <form
                        class="quantity-form"
                        action="{{ route('cart.update', $id) }}"
                        method="POST"
                    >
                        @csrf
                        @method('PATCH')

                        <label for="quantity-{{ $id }}">Quantity</label>

                        <input
                            id="quantity-{{ $id }}"
                            type="number"
                            name="quantity"
                            value="{{ $item['quantity'] }}"
                            min="1"
                            max="{{ min(99, $item['stock']) }}"
                            required
                        >

                        <button type="submit" class="button">
                            Update
                        </button>
                    </form>

                    <form
                        action="{{ route('cart.remove', $id) }}"
                        method="POST"
                        style="margin-top: 12px;"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="button remove-button"
                        >
                            Remove
                        </button>
                    </form>
                </div>
            </article>
        @empty
            <div class="empty-cart">
                <h2>Your cart is empty</h2>
                <p class="muted">
                    Explore our collection to find your perfect abaya.
                </p>

                <a
                    href="{{ url('/') }}#collection"
                    class="button"
                >
                    Explore Collection
                </a>
            </div>
        @endforelse

        @if (count($cart) > 0)
            <section class="summary">
                <p class="muted">Order summary</p>

                <h2 class="total">
                    Total: PKR {{ number_format($total, 2) }}
                </h2>

                <p class="muted">
                    Delivery charges, if any, will be confirmed at checkout.
                </p>

                <button
                    type="button"
                    class="button"
                    disabled
                    title="Checkout will be enabled in the next step"
                >
                   
<a href="{{ route('checkout.index') }}" class="checkout-btn">
    Proceed to Checkout
</a>

                </button>
            </section>
        @endif
    </main>

    <footer>
        <p><strong>NOOR ABAYAS</strong></p>
        <p>Timeless modest fashion, designed with care.</p>
        <p>&copy; 2026 Noor Abayas. All rights reserved.</p>
    </footer>
</body>
</html>
