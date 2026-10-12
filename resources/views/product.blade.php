
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product['name'] }} | Noor Abayas</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">

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
            margin: 0;
            padding: 0;
        }

        body {
            background: var(--cream);
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
        }

        header {
            padding: 24px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--line);
            background: var(--white);
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            letter-spacing: 4px;
            color: var(--ink);
            text-decoration: none;
        }

        nav a {
            margin-left: 25px;
            text-decoration: none;
            color: var(--ink);
            font-size: 14px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 28px;
            color: var(--muted);
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover {
            color: var(--gold);
        }

        .product-container {
            max-width: 1100px;
            margin: 55px auto;
            padding: 0 25px;
        }

        .product-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 55px;
            align-items: center;
        }

        .product-image {
            width: 100%;
            height: 560px;
            object-fit: cover;
            background: #eee7dc;
        }

        .eyebrow {
            color: var(--gold);
            font-size: 12px;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(32px, 4vw, 48px);
            font-weight: 400;
            line-height: 1.2;
            margin-bottom: 18px;
        }

        .price {
            font-size: 23px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .description {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.9;
            margin-bottom: 30px;
        }

        .specification {
            padding: 16px 0;
            border-top: 1px solid var(--line);
            display: flex;
            justify-content: space-between;
            gap: 20px;
            font-size: 14px;
        }

        .specification span:first-child {
            color: var(--muted);
        }

        .specification span:last-child {
            text-align: right;
        }

        .selection-field {
            margin-top: 24px;
        }

        .selection-field label {
            display: block;
            margin-bottom: 10px;
            font-size: 13px;
            font-weight: 600;
        }

        .selection-field select,
        .quantity-control input {
            padding: 12px;
            border: 1px solid var(--line);
            background: var(--white);
            color: var(--ink);
            font-family: inherit;
            font-size: 14px;
        }

        .selection-field select {
            width: 100%;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .quantity-control button {
            width: 42px;
            height: 42px;
            border: 1px solid var(--line);
            background: var(--white);
            color: var(--ink);
            cursor: pointer;
            font-size: 20px;
        }

        .quantity-control input {
            width: 70px;
            text-align: center;
        }

        .total-price {
            margin-top: 24px;
            font-size: 16px;
            font-weight: 600;
        }

        .order-button {
            display: block;
            margin-top: 30px;
            padding: 17px 20px;
            background: var(--ink);
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            letter-spacing: 1px;
            transition: background 0.2s;
        }

        .order-button:hover {
            background: var(--gold);
        }

        footer {
            text-align: center;
            padding: 28px 15px;
            border-top: 1px solid var(--line);
            color: var(--muted);
            font-size: 12px;
            letter-spacing: 2px;
        }

        @media (max-width: 700px) {
            header {
                padding: 20px;
            }

            .logo {
                font-size: 20px;
                letter-spacing: 2px;
            }

            nav a {
                margin-left: 12px;
                font-size: 12px;
            }

            .product-container {
                margin: 30px auto;
                padding: 0 18px;
            }

            .product-details {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .product-image {
                height: 420px;
            }
        }
    </style>
</head>

<body>

<header>
    <a href="{{ url('/') }}" class="logo">NOOR.</a>

    <nav>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/#collection') }}">Collection</a>
        <a href="{{ url('/#contact') }}">Contact</a>
    </nav>
</header>

<main class="product-container">

    <a href="{{ url('/#collection') }}" class="back-link">
        ← Back to Collection
    </a>

    <section class="product-details">

        <div>
            @php
                $images = [
                    1 => 'https://cdn.media.amplience.net/i/lmg/867Black-MP-867CP16052026_01-2100.jpg',
                    2 => 'https://www.houseofdollsbyanaya.co.uk/cdn/shop/files/rn-image_picker_lib_temp_cc6d1da5-f42d-46e9-8a0e-293c29b8dcdb.png?v=1772312176',
                    3 => 'https://ummejannah.com/cdn/shop/files/IMG-3853.jpg?v=1773054789',
                    4 => 'https://media.zid.store/60775460-e107-45c2-89a9-ffce4efe1292/a6e2800d-383c-454d-bc2a-89d985ed9ca2.jpg',
                    5 => 'https://abayalounge.com/cdn/shop/files/EmiratiBeigeOpenAbaya-8.jpg?v=1719833913&width=3075',
                    6 => 'https://hanayen.com/cdn/shop/files/chic-beige-abaya-with-minimalist-design-and-open-front-hanayen-abaya-luxury-abaya-online-43133395992830_grande.jpg?v=1729325484',
                    7 => 'https://sncouture.com/cdn/shop/files/SNC_0751_1024x1024.jpg?v=1742860530',
                    8 => 'https://abayalounge.com/cdn/shop/files/Zig-ZagEmbroideredOpenAbaya-1.jpg?v=1721647258&width=2785',
                ];
            @endphp

            <img
                class="product-image"
                src="{{ $images[$id] }}"
                alt="{{ $product['name'] }}"
            >
        </div>

        <div>
            <p class="eyebrow">Noor Abayas Collection</p>

            <h1>{{ $product['name'] }}</h1>

            <p class="price">
                PKR {{ number_format($product['price']) }}
            </p>

            <p class="description">
                {{ $product['description'] }}
            </p>

            <div class="specification">
                <span>Fabric</span>
                <span>{{ $product['fabric'] }}</span>
            </div>

            <div class="specification">
                <span>Color</span>
                <span>{{ $product['color'] }}</span>
            </div>

            <div class="specification">
                <span>Available sizes</span>
                <span>{{ $product['sizes'] }}</span>
            </div>

            <div class="selection-field">
                <label for="size">Select Size</label>
                <select id="size" name="size">
                    <option value="S">Small (S)</option>
                    <option value="M" selected>Medium (M)</option>
                    <option value="L">Large (L)</option>
                    <option value="XL">Extra Large (XL)</option>
                </select>
            </div>

            <div class="selection-field">
                <label for="quantity">Quantity</label>

                <div class="quantity-control">
                    <button type="button" id="decrease">−</button>

                    <input
                        type="number"
                        id="quantity"
                        value="1"
                        min="1"
                        max="10"
                    >

                    <button type="button" id="increase">+</button>
                </div>
            </div>

            <p class="total-price">
                Total: <span id="total-price">PKR {{ number_format($product['price']) }}</span>
            </p>

            <a
                class="order-button"
                id="order-link"
                href="#"
                target="_blank"
                rel="noopener noreferrer"
            >
                ENQUIRE ON WHATSAPP
            </a>
        </div>

    </section>
</main>

<footer>
    NOOR ABAYAS · ELEGANCE IN EVERY DETAIL
</footer>

<script>
    const quantityInput = document.getElementById('quantity');
    const decreaseButton = document.getElementById('decrease');
    const increaseButton = document.getElementById('increase');
    const sizeSelect = document.getElementById('size');
    const totalPrice = document.getElementById('total-price');
    const orderLink = document.getElementById('order-link');

    const productName = @json($product['name']);
    const price = Number(@json($product['price']));
    const whatsappNumber = '923001234567'; // Replace with your real WhatsApp number.

    function updateOrder() {
        let quantity = Number(quantityInput.value);

        if (!Number.isFinite(quantity) || quantity < 1) {
            quantity = 1;
        }

        quantity = Math.min(10, Math.floor(quantity));
        quantityInput.value = quantity;

        const size = sizeSelect.value;
        const total = price * quantity;

        totalPrice.textContent = 'PKR ' + total.toLocaleString('en-PK');

        const message =
            `Hi, I am interested in ${productName}. ` +
            `Size: ${size}. Quantity: ${quantity}. ` +
            `Unit price: PKR ${price.toLocaleString('en-PK')}. ` +
            `Total: PKR ${total.toLocaleString('en-PK')}. ` +
            `Please confirm availability.`;

        orderLink.href =
            'https://wa.me/' + whatsappNumber +
            '?text=' + encodeURIComponent(message);
    }

    decreaseButton.addEventListener('click', function () {
        quantityInput.value = Math.max(
            1,
            (Number(quantityInput.value) || 1) - 1
        );

        updateOrder();
    });

    increaseButton.addEventListener('click', function () {
        quantityInput.value = Math.min(
            10,
            (Number(quantityInput.value) || 1) + 1
        );

        updateOrder();
    });

    quantityInput.addEventListener('input', updateOrder);
    quantityInput.addEventListener('change', updateOrder);
    sizeSelect.addEventListener('change', updateOrder);

    updateOrder();
</script>

</body>
</html>
