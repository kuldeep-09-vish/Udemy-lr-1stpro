<x-admin-layout>

    <div class="product-container">
        <!-- Product Images -->
        <div class="product-images">
            <img src="{{ asset($category->image) }}" alt="Product Image">
        </div>

        <!-- Product Details -->
        <div class="product-details">   
            <h1>{{ $category->name }}</h1>
            <p class="product-description">
                {{ $category->discription }}
            </p>
            <div class="product-price">{{ $category->price }}</div>
            <div class="product-sku">SKU: {{ $category->sku }}</div>
            <button class="add-to-cart">Add to Cart</button>
        </div>
    </div>

    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f4f4f4;
    }

    .product-container {
        display: flex;
        gap: 40px;
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        max-width: 1000px;
        margin: auto;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .product-images {
        flex: 1;
    }

    .product-images img {
        width: 100%;
        border-radius: 12px;
        margin-bottom: 10px;
    }

    .product-details {
        flex: 1;
    }

    .product-details h1 {
        margin-top: 0;
    }

    .product-details p {
        line-height: 1.6;
    }

    .product-price {
        font-size: 24px;
        font-weight: bold;
        margin: 10px 0;
    }

    .product-sku {
        color: #888;
        margin-bottom: 20px;
    }

    .add-to-cart {
        padding: 12px 25px;
        background: #007bff;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
    }

    .add-to-cart:hover {
        background: #0056b3;
    }
    </style>
</x-admin-layout>