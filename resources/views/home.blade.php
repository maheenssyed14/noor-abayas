<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Discover elegant, timeless abayas for everyday wear and special occasions at Noor Abayas.">
    <meta name="theme-color" content="#f8f5ef">

    <title>Noor Abayas | Elegant Modest Wear</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --cream: #f8f5ef;
            --white: #fffefa;
            --ink: #25231f;
            --muted: #777168;
            --gold: #b89a68;
            --line: #e8e1d6;
            --gold-dark: #92764c;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 25px;
        }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
        }

        body, button, input, select {
            font-family: 'DM Sans', sans-serif;
        }

        button, input, select {
            font-size: inherit;
        }

        a {
            -webkit-tap-highlight-color: transparent;
        }

        button:focus-visible,
        a:focus-visible,
        input:focus-visible,
        select:focus-visible {
            outline: 2px solid var(--gold);
            outline-offset: 3px;
        }

        /* Navigation */

        nav {
            min-height: 82px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 20px 8%;
            background: var(--white);
            border-bottom: 1px solid var(--line);
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            letter-spacing: 4px;
            white-space: nowrap;
            text-decoration: none;
            color: var(--ink);
        }

        .nav-links {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 26px;
        }

        .nav-links a {
            color: var(--ink);
            text-decoration: none;
            font-size: 13px;
            transition: color .25s;
        }

        .nav-links a:hover {
            color: var(--gold-dark);
        }

        /* Hero */

        .hero {
            min-height: 620px;
            display: flex;
            align-items: center;
            padding: 90px 8%;
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(
                    90deg,
                    rgba(248, 245, 239, .98) 0%,
                    rgba(248, 245, 239, .90) 38%,
                    rgba(248, 245, 239, .58) 62%,
                    rgba(248, 245, 239, .12) 100%
                ),
                url('https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=1800&q=85')
                center 35% / cover no-repeat;
        }

        .hero-content {
            max-width: 590px;
            position: relative;
            z-index: 1;
        }

        .eyebrow {
            color: var(--gold-dark);
            font-size: 11px;
            letter-spacing: 4px;
            font-weight: 700;
        }

        .hero .eyebrow {
            display: inline-block;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--gold);
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-weight: 400;
            font-size: clamp(48px, 6vw, 76px);
            line-height: 1.12;
            letter-spacing: -1.5px;
            margin: 25px 0;
        }

        .hero p {
            max-width: 430px;
            font-size: 15px;
            line-height: 2;
            color: var(--muted);
        }

        .button {
            display: inline-block;
            margin-top: 24px;
            padding: 16px 26px;
            background: var(--ink);
            color: white;
            text-decoration: none;
            text-align: center;
            font-size: 12px;
            letter-spacing: 1px;
            transition: background .25s, transform .25s;
            border: 1px solid var(--ink);
            cursor: pointer;
        }

        .button:hover {
            background: var(--gold-dark);
            border-color: var(--gold-dark);
            transform: translateY(-2px);
        }

        /* Collection */

        .products {
            padding: 95px 8%;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-heading h2,
        .contact-section h2 {
            font-family: 'Playfair Display', serif;
            font-weight: 400;
            font-size: clamp(32px, 4vw, 48px);
            margin: 16px 0;
        }

        .section-heading > p:not(.eyebrow),
        .contact-section > p:not(.eyebrow) {
            color: var(--muted);
            line-height: 1.8;
        }

        /* Search and sorting */

        .collection-tools {
            max-width: 750px;
            margin: 0 auto 22px;
        }

        .search-row {
            display: flex;
            gap: 10px;
        }

        .search-input {
            width: 100%;
            min-width: 0;
            padding: 15px 16px;
            border: 1px solid var(--line);
            border-radius: 0;
            background: var(--white);
            color: var(--ink);
            font: inherit;
            outline: none;
        }

        .search-input:focus {
            border-color: var(--gold);
        }

        .clear-button {
            flex-shrink: 0;
            padding: 0 18px;
            background: var(--white);
            color: var(--ink);
            border: 1px solid var(--line);
            cursor: pointer;
            transition: background .2s, color .2s;
        }

        .clear-button:hover {
            background: var(--ink);
            color: white;
        }

        .sort-select {
            margin-top: 12px;
            cursor: pointer;
        }

        /* Category filters */

        .category-filters {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .filter-button {
            padding: 11px 18px;
            border: 1px solid var(--gold);
            background: transparent;
            color: var(--ink);
            font: inherit;
            font-size: 12px;
            cursor: pointer;
            transition: background .2s, color .2s;
        }

        .filter-button:hover,
        .filter-button.active {
            background: var(--ink);
            color: white;
            border-color: var(--ink);
        }

        .product-count {
            margin: 25px 0;
            color: var(--muted);
            text-align: center;
            font-size: 13px;
        }

        /* Product cards */

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 28px;
        }

        .product-card {
            min-width: 0;
            background: var(--white);
            border: 1px solid var(--line);
            transition: transform .25s, box-shadow .25s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px #25231f12;
        }

        .product-card[hidden],
        .no-products[hidden] {
            display: none !important;
        }

        .product-card img {
            display: block;
            width: 100%;
            height: 360px;
            object-fit: cover;
            background: #e8e1d6;
        }

        .image-placeholder {
            height: 360px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eee5d8;
            color: var(--muted);
            text-align: center;
            padding: 20px;
        }

        .product-info {
            padding: 24px;
        }

        .product-info h3 {
            font-family: 'Playfair Display', serif;
            font-weight: 500;
            font-size: 21px;
            line-height: 1.45;
            margin: 0 0 12px;
        }

        .product-price {
            font-size: 14px;
            font-weight: 700;
            color: var(--ink);
            margin: 0;
        }

        .product-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 18px;
        }

        .product-actions .button {
            width: 100%;
            margin-top: 0;
        }

        .view-details {
            display: block;
            width: 100%;
            padding: 14px 18px;
            text-align: center;
            color: var(--gold-dark);
            background: transparent;
            border: 1px solid var(--gold);
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            transition: color .25s, background .25s;
            cursor: pointer;
        }

        .view-details:hover {
            background: var(--gold);
            color: white;
        }

        .add-cart-form {
            margin: 0;
        }

        .no-products {
            grid-column: 1 / -1;
            padding: 45px 10px;
            text-align: center;
            color: var(--muted);
            line-height: 1.8;
        }

        /* Contact */

        .contact-section {
            padding: 80px 8%;
            text-align: center;
            background: #eee5d8;
        }

        .contact-section .button {
            margin-top: 15px;
        }

        /* Footer */

        footer {
            padding: 38px 8%;
            text-align: center;
            color: var(--muted);
            background: var(--white);
            border-top: 1px solid var(--line);
            font-size: 13px;
            line-height: 1.8;
        }

        footer p {
            margin: 8px 0;
        }

        /* Back to top */

        .back-to-top {
            position: fixed;
            right: 22px;
            bottom: 22px;
            z-index: 10;
            width: 46px;
            height: 46px;
            border: none;
            background: var(--ink);
            color: white;
            font-size: 22px;
            cursor: pointer;
            box-shadow: 0 5px 18px #25231f20;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: opacity .2s, visibility .2s, transform .2s;
        }

        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Tablet */

        @media (max-width: 800px) {
            nav {
                padding: 20px 5%;
            }

            .nav-links {
                gap: 14px;
            }

            .hero {
                min-height: 540px;
                padding: 70px 7%;
                background-position: 58% center;
            }

            .products {
                padding: 65px 6%;
            }

            .product-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 16px;
            }

            .product-card img,
            .image-placeholder {
                height: 280px;
            }

            .product-info {
                padding: 18px;
            }
        }

        /* Mobile */

        @media (max-width: 520px) {
            nav {
                align-items: flex-start;
                flex-direction: column;
                gap: 14px;
                padding: 18px 5%;
            }

            .logo {
                font-size: 25px;
                letter-spacing: 3px;
            }

            .nav-links {
                width: 100%;
                justify-content: space-between;
                gap: 10px;
            }

            .nav-links a {
                font-size: 11px;
            }

            .hero {
                min-height: 580px;
                padding: 65px 6%;
                background:
                    linear-gradient(
                        90deg,
                        rgba(248, 245, 239, .96) 0%,
                        rgba(248, 245, 239, .84) 58%,
                        rgba(248, 245, 239, .52) 100%
                    ),
                    url('https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=1000&q=85')
                    center / cover no-repeat;
            }

            h1 {
                font-size: clamp(42px, 12vw, 58px);
                letter-spacing: -1px;
            }

            .hero p {
                font-size: 14px;
                line-height: 1.9;
            }

            .hero .button {
                padding: 16px 22px;
            }

            .product-grid {
                grid-template-columns: 1fr;
            }

            .product-card img,
            .image-placeholder {
                height: 380px;
            }

            .section-heading {
                margin-bottom: 35px;
            }

            .search-row {
                gap: 6px;
            }

            .search-input {
                padding: 13px 11px;
            }

            .clear-button {
                padding: 0 12px;
            }

            .filter-button {
                padding: 10px 14px;
            }

            .contact-section {
                padding: 60px 6%;
            }

            footer {
                padding: 30px 6%;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                transition-duration: .01ms !important;
                animation-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

<nav>
    <a href="{{ url('/') }}" class="logo">NOOR.</a>

    <div class="nav-links">
        <a href="{{ url('/') }}">Home</a>
        <a href="#collection">Collection</a>
        <a href="#contact">Contact</a>
        <a href="{{ route('cart.index') }}">Cart</a>
        <a href="{{ route('admin.products.index') }}">Products</a>
    </div>
</nav>

<main class="hero">
    <div class="hero-content">
        <div class="eyebrow">TIMELESS MODEST FASHION</div>

        <h1>Elegance in Every Detail.</h1>

        <p>
            Discover thoughtfully designed abayas that bring
            together comfort, simplicity, and timeless style.
        </p>

        <a class="button" href="#collection">
            Explore Our Collection
        </a>
    </div>
</main>

<section class="products" id="collection">

    <div class="section-heading">
        <p class="eyebrow">OUR COLLECTION</p>
        <h2>Made for Your Moments</h2>
        <p>Discover timeless pieces for everyday elegance.</p>
    </div>

    <div class="collection-tools">

        <div class="search-row">
            <input
                type="search"
                id="product-search"
                class="search-input"
                placeholder="Search abayas by name..."
                aria-label="Search abayas by name"
                autocomplete="off"
            >

            <button
                type="button"
                id="clear-search"
                class="clear-button"
                aria-label="Clear search and filters"
            >
                Clear
            </button>
        </div>

        <label
            for="product-sort"
            class="eyebrow"
            style="display:block; margin-top:22px;"
        >
            SORT COLLECTION
        </label>

        <select
            id="product-sort"
            class="search-input sort-select"
            aria-label="Sort products"
        >
            <option value="default">Featured</option>
            <option value="price-asc">Price: Low to High</option>
            <option value="price-desc">Price: High to Low</option>
            <option value="name-asc">Name: A to Z</option>
        </select>

        <div class="category-filters" aria-label="Filter by category">

            <button
                type="button"
                class="filter-button active"
                data-category="all"
                aria-pressed="true"
            >
                All
            </button>

            <button
                type="button"
                class="filter-button"
                data-category="classic"
                aria-pressed="false"
            >
                Classic
            </button>

            <button
                type="button"
                class="filter-button"
                data-category="elegant"
                aria-pressed="false"
            >
                Elegant
            </button>

            <button
                type="button"
                class="filter-button"
                data-category="premium"
                aria-pressed="false"
            >
                Premium
            </button>

            <button
                type="button"
                class="filter-button"
                data-category="formal"
                aria-pressed="false"
            >
                Formal
            </button>

            <button
                type="button"
                class="filter-button"
                data-category="occasion"
                aria-pressed="false"
            >
                Occasion
            </button>

        </div>
    </div>

    <p id="product-count" class="product-count" aria-live="polite">
        Showing {{ $products->count() }} products
    </p>

    <div class="product-grid" id="product-grid">

        @forelse ($products as $product)

            <article
                class="product-card"
                data-category="{{ strtolower(trim($product->category ?? 'all')) }}"
                data-price="{{ $product->price }}"
                data-name="{{ $product->name }}"
            >

                @if ($product->image)

                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        loading="lazy"
                        decoding="async"
                    >

                @else

                    <div class="image-placeholder">
                        Image coming soon
                    </div>

                @endif

                <div class="product-info">

                    <h3>{{ $product->name }}</h3>

                    <p class="product-price">
                        PKR {{ number_format($product->price) }}
                    </p>

                    <div class="product-actions">

                        <a
                            href="{{ route('product.show', ['id' => $product->id]) }}"
                            class="view-details"
                        >
                            View Details →
                        </a>

                        <form
                            action="{{ route('cart.add', ['id' => $product->id]) }}"
                            method="POST"
                            class="add-cart-form"
                        >
                            @csrf

                            <button type="submit" class="view-details">
                                Add to Cart
                            </button>
                        </form>

                        <a
                            href="https://wa.me/923001234567?text={{ urlencode('Hi, I am interested in the ' . $product->name . '.') }}"
                            class="button"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            Enquire on WhatsApp
                        </a>

                    </div>
                </div>
            </article>

        @empty

            <p class="no-products">
                No products available yet. Please check back soon.
            </p>

        @endforelse

    </div>
</section>

<section class="contact-section" id="contact">

    <p class="eyebrow">LET'S CONNECT</p>

    <h2>Find Your Perfect Abaya</h2>

    <p>
        Have a question about our collection?
        We'd love to hear from you.
    </p>

    <a
        class="button"
        href="https://wa.me/923001234567"
        target="_blank"
        rel="noopener noreferrer"
    >
        Contact Us on WhatsApp
    </a>

</section>

<footer>
    <p><strong>NOOR ABAYAS</strong></p>
    <p>Timeless modest fashion, designed with care.</p>
    <p>&copy; {{ date('Y') }} Noor Abayas. All rights reserved.</p>
</footer>

<button
    type="button"
    class="back-to-top"
    id="back-to-top"
    aria-label="Back to top"
    title="Back to top"
>
    ↑
</button>

<script>
    const searchInput = document.getElementById('product-search');
    const clearSearchButton = document.getElementById('clear-search');
    const sortSelect = document.getElementById('product-sort');
    const filterButtons = document.querySelectorAll('.filter-button');
    const productGrid = document.getElementById('product-grid');
    const productCount = document.getElementById('product-count');
    const backToTopButton = document.getElementById('back-to-top');

    // Keep the original database order for Featured sorting.
    const productCards = Array.from(
        productGrid.querySelectorAll('.product-card')
    );

    let selectedCategory = 'all';

    // Empty-state message for searches and filters.
    const noProductsMessage = document.createElement('p');

    noProductsMessage.className = 'no-products';
    noProductsMessage.textContent =
        'No matching abayas found. Try another search or category.';
    noProductsMessage.hidden = true;

    productGrid.appendChild(noProductsMessage);

    function sortProducts() {
        const sortOption = sortSelect.value;
        const sortedCards = [...productCards];

        if (sortOption === 'price-asc') {
            sortedCards.sort((a, b) => {
                return Number(a.dataset.price) - Number(b.dataset.price);
            });
        } else if (sortOption === 'price-desc') {
            sortedCards.sort((a, b) => {
                return Number(b.dataset.price) - Number(a.dataset.price);
            });
        } else if (sortOption === 'name-asc') {
            sortedCards.sort((a, b) => {
                return a.dataset.name.localeCompare(
                    b.dataset.name,
                    undefined,
                    { sensitivity: 'base' }
                );
            });
        }

        // Reorder existing elements without rebuilding their contents.
        sortedCards.forEach(card => {
            productGrid.insertBefore(card, noProductsMessage);
        });
    }

    function filterProducts() {
        const searchText = searchInput.value.trim().toLowerCase();
        let visibleCount = 0;

        productCards.forEach(card => {
            const image = card.querySelector('img');

            const searchableText = (
                card.dataset.name + ' ' +
                (image ? image.alt : '')
            ).toLowerCase();

            const matchesSearch = searchableText.includes(searchText);

            const matchesCategory =
                selectedCategory === 'all' ||
                card.dataset.category === selectedCategory;

            const isVisible = matchesSearch && matchesCategory;

            card.hidden = !isVisible;

            if (isVisible) {
                visibleCount++;
            }
        });

        productCount.textContent =
            'Showing ' + visibleCount +
            (visibleCount === 1 ? ' product' : ' products');

        noProductsMessage.hidden = visibleCount !== 0;
    }

    // Search as the user types.
    searchInput.addEventListener('input', filterProducts);

    // Reset search, category and sorting.
    clearSearchButton.addEventListener('click', () => {
        searchInput.value = '';
        selectedCategory = 'all';
        sortSelect.value = 'default';

        filterButtons.forEach(button => {
            const isAll = button.dataset.category === 'all';

            button.classList.toggle('active', isAll);
            button.setAttribute('aria-pressed', String(isAll));
        });

        sortProducts();
        filterProducts();
        searchInput.focus();
    });

    // Filter products by their database category.
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            selectedCategory = button.dataset.category;

            filterButtons.forEach(item => {
                const isActive = item === button;

                item.classList.toggle('active', isActive);
                item.setAttribute('aria-pressed', String(isActive));
            });

            filterProducts();
        });
    });

    // Sort whenever the selection changes.
    sortSelect.addEventListener('change', () => {
        sortProducts();
        filterProducts();
    });

    // Show the back-to-top button after scrolling.
    window.addEventListener('scroll', () => {
        backToTopButton.classList.toggle(
            'visible',
            window.scrollY > 400
        );
    }, { passive: true });

    backToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Initialize the collection.
    sortProducts();
    filterProducts();
</script>

</body>
</html>