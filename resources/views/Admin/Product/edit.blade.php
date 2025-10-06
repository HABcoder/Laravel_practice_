<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #f8f9fb, #eef1f8);
      font-family: "Poppins", sans-serif;
      color: #333;
      padding: 40px 0;
    }

    .form-container {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
      padding: 40px 50px;
      animation: fadeIn 0.6s ease-in-out;
    }

    .form-header {
      border-left: 5px solid #4e73df;
      padding-left: 15px;
      margin-bottom: 30px;
    }

    .form-header h1 {
      font-size: 1.8rem;
      font-weight: 700;
      color: #4e73df;
    }

    .form-header p {
      font-size: 0.95rem;
      color: #6c757d;
    }

    .form-section {
      margin-bottom: 35px;
      padding: 25px;
      border: 1px solid #eee;
      border-radius: 15px;
      background-color: #fafbfe;
      transition: all 0.3s;
    }

    .form-section:hover {
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
      transform: translateY(-3px);
    }

    .form-section h5 {
      font-weight: 600;
      color: #4e73df;
      margin-bottom: 20px;
    }

    .form-label {
      font-weight: 600;
      color: #555;
    }

    .form-control,
    .form-select {
      border-radius: 12px;
      border: 1px solid #ced4da;
      transition: all 0.3s ease;
      font-size: 0.95rem;
      padding: 10px 14px;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: #4e73df;
      box-shadow: 0 0 8px rgba(78, 115, 223, 0.3);
      transform: scale(1.02);
    }

    .btn-primary {
      background: linear-gradient(45deg, #4e73df, #6f42c1);
      border: none;
      border-radius: 10px;
      padding: 12px 25px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(78, 115, 223, 0.3);
    }

    .btn-outline-secondary {
      border-radius: 10px;
      padding: 12px 25px;
      font-weight: 600;
    }

    .fa-section-icon {
      color: #4e73df;
      margin-right: 8px;
    }

    .form-text {
      color: #6c757d;
      font-size: 0.85rem;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 768px) {
      .form-container {
        padding: 25px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="form-container">
          <div class="form-header">
            <h1><i class="fas fa-pen-to-square me-2"></i>Edit Product</h1>
            <p>Update your product information below.</p>
          </div>

          <form action="{{ route('products.update', $product->product_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Basic Info -->
            <div class="form-section">
              <h5><i class="fa-solid fa-circle-info fa-section-icon"></i>Basic Information</h5>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label required">Product Name</label>
                  <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}">
                </div>

                <div class="col-md-6 mb-3">
                  <label class="form-label required">SKU</label>
                  <input type="text" name="sku" class="form-control" value="{{ $product->sku }}">
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Short Description</label>
                <input type="text" id="shortDescription" name="short_description" class="form-control"
                  value="{{ $product->short_description }}">
                <div class="form-text"><span id="shortDescCounter">0</span>/500 characters</div>
              </div>

              <div class="mb-3">
                <label class="form-label">Full Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
              </div>
            </div>

            <!-- Status -->
            <div class="form-section">
              <h5><i class="fas fa-toggle-on fa-section-icon"></i>Status & Activation</h5>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label required">Product Status</label>
                  <select class="form-select" name="status">
                    <option value="pending" {{ $product->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $product->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $product->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                  </select>
                </div>

                <div class="col-md-6 mb-3">
                  <label class="form-label required">Active Status</label>
                  <select class="form-select" name="is_active">
                    <option value="active" {{ $product->is_active == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="de_active" {{ $product->is_active == 'de_active' ? 'selected' : '' }}>Deactivated</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Pricing -->
            <div class="form-section">
              <h5><i class="fas fa-dollar-sign fa-section-icon"></i>Pricing Information</h5>
              <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="form-label required">Price ($)</label>
                  <input type="number" step="0.01" min="0" name="price" class="form-control" value="{{ $product->price }}">
                </div>
                <div class="col-md-4 mb-3">
                  <label class="form-label">Discount Price ($)</label>
                  <input type="number" step="0.01" min="0" name="discount_price" class="form-control"
                    value="{{ $product->discount_price }}">
                </div>
                <div class="col-md-4 mb-3">
                  <label class="form-label">Cost Price ($)</label>
                  <input type="number" step="0.01" min="0" name="cost_price" class="form-control"
                    value="{{ $product->cost_price }}">
                </div>
              </div>
            </div>

            <!-- Inventory -->
            <div class="form-section">
              <h5><i class="fas fa-boxes fa-section-icon"></i>Inventory</h5>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label required">Quantity in Stock</label>
                  <input type="number" name="stock" class="form-control" value="{{ $product->quantity_in_stock }}">
                </div>
              </div>
            </div>

            <!-- Image -->
            <div class="form-section">
              <h5><i class="fas fa-image fa-section-icon"></i>Product Image</h5>
              <input type="file" name="image_url" class="form-control mb-2" accept="image/*">
              @if($product->image_url)
                <img src="{{ asset('image/' . $product->image_url) }}" alt="Product Image"
                  class="img-thumbnail mt-2" width="120">
              @endif
            </div>

            <div class="d-flex justify-content-between mt-4">
              <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Cancel
              </a>
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>Update Product
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    const shortDesc = document.getElementById('shortDescription');
    const counter = document.getElementById('shortDescCounter');
    if (shortDesc) {
      counter.textContent = shortDesc.value.length;
      shortDesc.addEventListener('input', () => {
        counter.textContent = shortDesc.value.length;
      });
    }
  </script>
</body>
</html>
