<x-admin-layout>

    <!-- Page Header -->
    <div class="content-header">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories Information</h1>
                </div>
                <div class="col-sm-6">
                    <form action="{{ route('category.create') }}" method="GET">
                        <button type="submit" class="btn btn-primary float-sm-right">
                            Add New Category
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="wrap">
        <div class="table-card scroll-x">
            <table aria-label="Product list">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <!-- <th>Description</th> -->
                        <th>SKU</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categorys as $category)
                    <tr>
                        <td class="id">{{ $category->id }}</td>
                        <td class="img-cell">
                            <img class="thumb" src="{{ asset($category->image) }}" alt="Product Image" />
                        </td>

                        <td class="name">{{ $category->name }}</td>
                        <td><span class="sku">{{ $category->sku }}</span></td>
                        <td class="price">{{ $category->price }}</td>
                        <td class="action-icons">
                            <!-- View -->
                            <a href="{{route ('admin.category.show', $category->id ) }}" class="text-info mr-2" title="View">
                                <i class="fas fa-eye"></i>
                            </a>

                            <!-- Update -->
                            <a href="{{route('category.edit', $category->id )}}" class="text-warning mr-2" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Delete -->

                            <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
    :root {
        --bg: #f5f6fa;
        --card: #ffffff;
        --text: #2f3640;
        --muted: #718093;
        --accent: #e84118;
        --border: #dcdde1;
    }

    body {
        margin: 0;
        font-family: system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
        background: var(--bg);
        color: var(--text);
        padding: 24px;
    }

    .wrap {
        max-width: 98%;
        margin: auto;
    }

    h1 {
        font-size: clamp(24px, 2.4vw, 32px);
        margin: 0 0 16px;
        letter-spacing: 0.5px;
    }

    .table-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    thead th {
        text-align: left;
        font-weight: 600;
        font-size: 14px;
        color: var(--muted);
        padding: 16px;
        background: #f1f2f6;
        border-bottom: 2px solid var(--border);
    }

    tbody td {
        padding: 16px;
        border-bottom: 1px solid var(--border);
        vertical-align: middle;
        font-size: 15px;
        word-wrap: break-word;
    }

    tbody tr:hover {
        background: #f8f9fa;
    }

    .img-cell {
        width: 150px;
    }

    .thumb {
        width: 120px;
        height: 100px;
        border-radius: 8px;
        object-fit: cover;
        border: 1px solid var(--border);
    }

    .name {
        font-weight: 600;
    }

    .sku {
        font-family: monospace;
        font-size: 13px;
        color: var(--muted);
        background: #f1f2f6;
        padding: 4px 8px;
        border-radius: 6px;
        display: inline-block;
    }

    .price {
        font-weight: 700;
        color: var(--accent);
    }

    .desc {
        color: var(--text);
        line-height: 1.5;
        max-width: 250px;
        white-space: normal;
    }

    .scroll-x {
        overflow-x: auto;
    }

    .action-icons a,
    .action-icons .btn-icon {
        font-size: 16px;
        margin-right: 8px;
        border: none;
        background: none;
        cursor: pointer;
    }

    .action-icons .btn-icon i {
        pointer-events: none;
    }

    /* Responsive */
    @media (max-width: 768px) {

        .img-cell,
        .thumb {
            width: 80px;
            height: 60px;
        }

        tbody td,
        thead th {
            padding: 12px;
        }

        .desc {
            max-width: 150px;
        }

        .action-icons a,
        .action-icons .btn-icon {
            margin-right: 5px;
        }
    }
    </style>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sabhi delete button par event lagao
        document.querySelectorAll('.delete-btn').forEach(function(button) {
            button.addEventListener('click', function(e) {
                let form = this.closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
    </script> -->
</x-admin-layout>