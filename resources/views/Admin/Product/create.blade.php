@extends('Master.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Bootstrap 5 CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Font Awesome -->
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
        
        .form-section h5 i {
            margin-right: 10px;
        }
        
        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #495057;
        }
        
        .form-control, .form-select {
            border-radius: var(--border-radius);
            padding: 10px 15px;
            border: 1px solid #ced4da;
            transition: all 0.3s;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 10px 25px;
            border-radius: var(--border-radius);
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .btn-outline-secondary {
            border-radius: var(--border-radius);
            padding: 10px 25px;
            font-weight: 600;
        }
        
        .price-container {
            display: flex;
            gap: 15px;
        }
        
        .price-container .form-group {
            flex: 1;
        }
        
        .stock-alert {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 5px;
        }
        
        @media (max-width: 768px) {
            .price-container {
                flex-direction: column;
                gap: 0;
            }
            
            .form-container {
                padding: 20px 15px;
            }
        }
        
        .required:after {
            content: " *";
            color: #e32;
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
                        <p class="text-muted">Fill in the product details below. Fields marked with * are required.</p>
                    </div>
                    
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Basic Information Section -->
                        <div class="form-section">
                            <h5><i class="fas fa-info-circle"></i> Basic Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="productName" class="form-label required">Product Name</label>
                                    <input type="text" class="form-control" id="productName" name="product_name" placeholder="Enter product name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sku" class="form-label required">SKU</label>
                                    <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter product SKU" required>
                                    <div class="form-text">Stock Keeping Unit (must be unique)</div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="shortDescription" class="form-label">Short Description</label>
                                <textarea class="form-control" id="shortDescription" name="short_description" rows="2" placeholder="Brief product description (max 500 characters)" maxlength="500"></textarea>
                                <div class="form-text"><span id="shortDescCounter">0</span>/500 characters</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Full Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Detailed product description"></textarea>
                            </div>
                        </div>
                        
                        <!-- Category & Status Section -->
                        <div class="form-section">
                            <h5><i class="fas fa-tags"></i> Category & Status</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="subCategory" class="form-label required">Sub Category</label>
                                    <select class="form-select" id="subCategory" name="sub_category_id" required>
                                        <option value="" selected disabled>Select a sub-category</option>
                                        <!-- Options would be populated dynamically -->
                                        <option value="1">Electronics - Smartphones</option>
                                        <option value="2">Clothing - T-Shirts</option>
                                        <option value="3">Home & Garden - Furniture</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="status" class="form-label required">Status</label>
                                    <select class="form-select" id="status" name="is_active" required>
                                        <option value="de_active" selected>Deactivated</option>
                                        <option value="active">Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pricing Section -->
                        <div class="form-section">
                            <h5><i class="fas fa-tag"></i> Pricing Information</h5>
                            <div class="price-container">
                                <div class="form-group mb-3">
                                    <label for="price" class="form-label required">Price ($)</label>
                                    <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" placeholder="0.00" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="discountPrice" class="form-label">Discount Price ($)</label>
                                    <input type="number" class="form-control" id="discountPrice" name="discount_price" step="0.01" min="0" placeholder="0.00">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="costPrice" class="form-label">Cost Price ($)</label>
                                    <input type="number" class="form-control" id="costPrice" name="cost_price" step="0.01" min="0" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Inventory Section -->
                        <div class="form-section">
                            <h5><i class="fas fa-boxes"></i> Inventory Management</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="quantity" class="form-label required">Quantity in Stock</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity_in_stock" min="0" value="0" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="minStock" class="form-label">Minimum Stock Level</label>
                                    <input type="number" class="form-control" id="minStock" name="min_stock_level" min="0" value="5">
                                    <div class="stock-alert">Alert when stock falls below this level</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Image Section -->
                        <div class="form-section">
                            <h5><i class="fas fa-image"></i> Product Image</h5>
                            <div class="mb-3">
                                <label for="imageUpload" class="form-label">Product Image</label>
                                <input class="form-control" type="file" id="imageUpload" name="image_url" accept="image/*">
                                <div class="form-text">Upload a product image (JPEG, PNG, etc.)</div>
                            </div>
                            <div class="image-preview mt-3 d-none">
                                <p class="form-label">Image Preview:</p>
                                <img id="imagePreview" src="#" alt="Product image preview" class="img-thumbnail" style="max-height: 200px; display: none;">
                            </div>
                        </div>
                        
                        <!-- Form Actions -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Save Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
    
    <script>
        // Character counter for short description
        document.getElementById('shortDescription').addEventListener('input', function() {
            document.getElementById('shortDescCounter').textContent = this.value.length;
        });
        
        // Image preview functionality
        document.getElementById('imageUpload').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                    document.getElementById('imagePreview').style.display = 'block';
                    document.querySelector('.image-preview').classList.remove('d-none');
                }
                reader.readAsDataURL(file);
            }
        });
        
        // Auto-calculate discount if both price and discount price are entered
        document.getElementById('price').addEventListener('blur', calculateDiscount);
        document.getElementById('discountPrice').addEventListener('blur', calculateDiscount);
        
        function calculateDiscount() {
            const price = parseFloat(document.getElementById('price').value) || 0;
            const discountPrice = parseFloat(document.getElementById('discountPrice').value) || 0;
            
            if (price > 0 && discountPrice > 0) {
                const discountPercent = ((price - discountPrice) / price * 100).toFixed(1);
                if (discountPercent > 0) {
                    // Show discount percentage (you could display it somewhere)
                    console.log(`Discount: ${discountPercent}%`);
                }
            }
        }
    </script>
</body>
</html>
@endsection