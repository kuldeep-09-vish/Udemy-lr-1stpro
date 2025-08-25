<x-admin-layout>
<style>
body {
    background-color: #f8f9fa;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.form-container {
    background: #fff;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    max-width: 700px;
    margin: auto;
}

.form-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 30px;
    text-align: center;
    color: #333;
}

.form-group {
    margin-bottom: 25px;
}

label {
    display: block;
    font-weight: 600;
    margin-bottom: 5px;
    color: #555;
}

input[type="text"],
input[type="number"],
textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

input[readonly] {
    background-color: #f1f1f1;
    border-color: #ddd;
}

input[type="text"]:focus,
input[type="number"]:focus,
textarea:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
    outline: none;
}

textarea {
    min-height: 120px;
    resize: vertical;
}

.form-image {
    display: block;
    margin-bottom: 15px;
    border-radius: 8px;
    max-width: 150px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.btn-update {
    background-color: #007bff;
    color: #fff;
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s ease;
}

.btn-update:hover {
    background-color: #0056b3;
}

.alert {
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
}

.old-value {
    font-size: 0.9rem;
    color: #888;
    margin-bottom: 5px;
}
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="form-container">
                <h2 class="form-title">Edit Product</h2>

                <!-- Success Message -->
                @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Error Message -->
                @if(session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
                @endif

                <form action="{{ route('submit.update.catogery', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Old Product Image -->
                    @if($category->image)
                    <div class="form-group">
                        <label>Old Image:</label>
                        <img src="{{ asset($category->image) }}" alt="Product Image" class="form-image">
                    </div>
                    @endif

                    <!-- New Image Upload -->
                    <div class="form-group">
                        <label for="image">Change Image:</label>
                        <input type="file" id="image" name="image">
                    </div>

                    <!-- Product Name -->
                    <div class="form-group">
                        <label>Old Product Name:</label>
                        <input type="text" value="{{ $category->name }}" readonly>
                        <label>New Product Name:</label>
                        <input type="text" name="name" value="{{ old('name', $category->name) }}">
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label>Old Description:</label>
                        <textarea readonly>{{ $category->discription }}</textarea>
                        <label>New Description:</label>
                        <textarea name="discription">{{ old('discription', $category->discription) }}</textarea>
                    </div>

                    <!-- SKU -->
                    <div class="form-group">
                        <label>Old SKU:</label>
                        <input type="text" value="{{ $category->sku }}" readonly>
                        <label>New SKU:</label>
                        <input type="text" name="sku" value="{{ old('sku', $category->sku) }}">
                    </div>

                    <!-- Price -->
                    <div class="form-group">
                        <label>Old Price ($):</label>
                        <input type="number" value="{{ $category->price }}" readonly>
                        <label>New Price ($):</label>
                        <input type="number" step="0.01" name="price" value="{{ old('price', $category->price) }}">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn-update">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
