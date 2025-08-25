<x-admin-layout>
    <!-- Bootstrap CSS -->
    <style>
    body {
        background-color: #f8f9fa;
    }

    .form-container {
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 20px;
        text-align: center;
    }

    .error-text {
        color: red;
        font-size: 0.9rem;
    }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-container">
                    <h2 class="form-title">Create Product</h2>

                    <!-- Show Success Message -->
                    @if(session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Show Error Message -->
                    @if(session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('submit.create.catogery') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Image URL -->
                        <!-- <div class="mb-3">
                            <label for="productImage" class="form-label">Product Image URL</label>
                            <input type="url" class="form-control" id="productImage" name="image"
                                placeholder="https://example.com/image.jpg" value="{{ old('image') }}">
                            @error('image')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div> -->
                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="productImage" name="image" accept="image/*">
                            @error('image')
                            <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Name -->
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="name"
                                placeholder="Enter product name" value="{{ old('name') }}">
                            @error('name')
                            <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="productDescription" name="discription" rows="3"
                                placeholder="Enter product description">{{ old('discription') }}</textarea>
                            @error('discription')
                            <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- SKU -->
                        <div class="mb-3">
                            <label for="productSku" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="productSku" name="sku" placeholder="Enter SKU"
                                value="{{ old('sku') }}">
                            @error('sku')
                            <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" id="productPrice" name="price"
                                placeholder="Enter price" value="{{ old('price') }}">
                            @error('price')
                            <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Save Product</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>