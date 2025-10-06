<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #4cc9f0;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark-color);
            padding-top: 20px;
            padding-bottom: 40px;
        }
        .form-container {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 30px;
            margin-bottom: 30px;
        }
        .form-header {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 15px;
            margin-bottom: 25px;
            color: var(--primary-color);
        }
        .form-section {
            margin-bottom: 25px;
            padding: 20px;
            border-radius: var(--border-radius);
            background-color: var(--light-color);
        }
        .form-section h5 {
            color: var(--secondary-color);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        .form-section h5 i { margin-right: 10px; }
        .required:after { content: " *"; color: #e32; }

                
        .page-container {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .page-header {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 15px;
            margin-bottom: 25px;
            color: var(--primary-color);
        }
        
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card i {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .stat-card.total i { color: var(--primary-color); }
        .stat-card.active i { color: var(--success-color); }
        .stat-card.pending i { color: var(--warning-color); }
        .stat-card.low-stock i { color: var(--danger-color); }
        
        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            margin: 10px 0;
        }
        
        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .table-container {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }
        
        .table-header {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .table-header h3 {
            margin: 0;
            font-size: 1.3rem;
        }
        
        .table-responsive {
            overflow-x: auto;
        }
        
        .table th {
            background-color: #e9ecef;
            border-top: none;
            font-weight: 600;
            color: #495057;
            position: sticky;
            top: 0;
        }
        
        .table td {
            vertical-align: middle;
        }
        
        .product-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
        }
        
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-approved {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        
        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .status-active {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-deactive {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .stock-low {
            color: var(--danger-color);
            font-weight: 600;
        }
        
        .action-buttons {
            display: flex;
            gap: 5px;
        }
        
        .btn-action {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .btn-view {
            background-color: #e2e3e5;
            color: #383d41;
            border: none;
        }
        
        .btn-edit {
            background-color: #d1ecf1;
            color: #0c5460;
            border: none;
        }
        
        .btn-delete {
            background-color: #f8d7da;
            color: #721c24;
            border: none;
        }
        
        .search-filter {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .search-box {
            flex: 1;
            min-width: 250px;
        }
        
        .filter-select {
            width: 200px;
        }
        
        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
        }
        
        .price-sort {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .price-sort-btn {
            background: none;
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 6px 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s;
        }
        
        .price-sort-btn.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        .price-sort-btn:hover:not(.active) {
            background-color: #e9ecef;
        }
        
        .filter-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }
        
        .filter-tag {
            background-color: #e9ecef;
            border-radius: 20px;
            padding: 5px 12px;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .filter-tag .close {
            cursor: pointer;
            margin-left: 5px;
        }
        
        .discount-badge {
            background-color: var(--danger-color);
            color: white;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 0.7rem;
            margin-left: 5px;
        }
        
        @media (max-width: 768px) {
            .table-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .search-filter {
                flex-direction: column;
            }
            
            .search-box, .filter-select {
                width: 100%;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .price-sort {
                justify-content: space-between;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="form-container">
                    <div class="form-header">
                        <h1 class="h3"><i class="fas fa-plus-circle me-2"></i>Add New Product</h1>
                        <p class="text-muted">Fill in the product details below.</p>
                    </div>

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                          @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                   </div>
                  @endif
                        @csrf
                        <!-- Basic Info -->
                        <div class="form-section">
                            <h5><i class="fas fa-info-circle"></i> Basic Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">SKU</label>
                                    <input type="text" name="sku" class="form-control" required>
                                    <div class="form-text">Must be unique</div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Short Description</label>
                                <textarea name="short_description" id="shortDescription" class="form-control" maxlength="500"></textarea>
                                <div class="form-text"><span id="shortDescCounter">0</span>/500 characters</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Full Description</label>
                                <textarea name="description" class="form-control" rows="4"></textarea>
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="form-section">
                            <h5><i class="fas fa-tags"></i> Category & Status</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">Sub Category</label>
                                    <select class="form-select" name="sub_category" required>
                                        <option value="" disabled selected>Select a sub-category</option>
                                        @foreach($all_cat as $cat)
                                            <option value="{{ $cat->sub_category_id }}">
                                                {{ $cat->category_name }} - {{ $cat->sub_category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">Active Status</label>
                                    <select class="form-select" name="is_active" required>
                                        <option value="de_active" selected>Deactivated</option>
                                        <option value="active">Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Pricing -->
                        <div class="form-section">
                            <h5><i class="fas fa-tag"></i> Pricing Information</h5>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label required">Price ($)</label>
                                    <input type="number" name="price" step="0.01" min="0" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Discount Price ($)</label>
                                    <input type="number" name="discount_price" step="0.01" min="0" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Cost Price ($)</label>
                                    <input type="number" name="cost_price" step="0.01" min="0" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Inventory -->
                        <div class="form-section">
                            <h5><i class="fas fa-boxes"></i> Inventory</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">Quantity in Stock</label>
                                    <input type="number" name="stock" min="0" value="0" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Minimum Stock Level</label>
                                    <input type="number" name="min_stock" min="0" value="5" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="form-section">
                            <h5><i class="fas fa-image"></i> Product Image</h5>
                            <input type="file" name="image_url" class="form-control" accept="image/*">
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary"><i class="fas fa-times me-2"></i>Cancel</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Save Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
document.getElementById('shortDescription').addEventListener('input', function() {
    document.getElementById('shortDescCounter').textContent = this.value.length;
});
</script>
</body>
</html>
