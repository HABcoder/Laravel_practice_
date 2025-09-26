@extends('Master.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #4cc9f0;
            --warning-color: #f8961e;
            --danger-color: #f94144;
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
        <div class="page-container">
            <div class="page-header">
                <h1><i class="fas fa-boxes me-2"></i>Product Management</h1>
                <p class="text-muted">Manage your product inventory, status, and details</p>
            </div>
            
            <!-- Stats Cards -->
            <div class="stats-cards">
                <div class="stat-card total">
                    <i class="fas fa-cubes"></i>
                    <div class="stat-value" id="totalProducts">0</div>
                    <div class="stat-label">Total Products</div>
                </div>
                <div class="stat-card active">
                    <i class="fas fa-check-circle"></i>
                    <div class="stat-value" id="activeProducts">0</div>
                    <div class="stat-label">Active Products</div>
                </div>
                <div class="stat-card pending">
                    <i class="fas fa-clock"></i>
                    <div class="stat-value" id="pendingProducts">0</div>
                    <div class="stat-label">Pending Approval</div>
                </div>
                <div class="stat-card low-stock">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div class="stat-value" id="lowStockProducts">0</div>
                    <div class="stat-label">Low Stock Items</div>
                </div>
            </div>
            
            <!-- Search and Filter -->
            <div class="search-filter">
                <div class="search-box">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" id="searchInput" placeholder="Search products...">
                    </div>
                </div>
                <div class="filter-select">
                    <select class="form-select" id="statusFilter">
                        <option value="all" selected>All Status</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
                <div class="filter-select">
                    <select class="form-select" id="activeFilter">
                        <option value="all" selected>All Active Status</option>
                        <option value="active">Active Only</option>
                        <option value="de_active">Deactive Only</option>
                    </select>
                </div>
                <div class="price-sort">
                    <span class="me-2">Price:</span>
                    <button class="price-sort-btn" id="priceLowHigh">
                        <i class="fas fa-sort-amount-down-alt"></i> Low to High
                    </button>
                    <button class="price-sort-btn" id="priceHighLow">
                        <i class="fas fa-sort-amount-down"></i> High to Low
                    </button>
                </div>
                <button class="btn btn-primary" id="addProductBtn">
                    <i class="fas fa-plus me-2"></i>Add New Product
                </button>
            </div>
            
            <!-- Active Filters Display -->
            <div class="filter-tags" id="activeFilters">
                <!-- Active filters will appear here -->
            </div>
            
            <!-- Products Table -->
            <div class="table-container">
                <div class="table-header">
                    <h3><i class="fas fa-list me-2"></i>Product List</h3>
                    <div class="text-muted" id="productCount">Showing 0 of 0 products</div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover" id="productsTable">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <!-- Table rows will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="pagination-container">
                    <div class="text-muted" id="paginationInfo">Showing 0 to 0 of 0 entries</div>
                    <nav>
                        <ul class="pagination mb-0" id="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" id="prevPage">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" id="nextPage">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // State variables
        let allProducts = [];
        let filteredProducts = [];
        let currentSort = null;
        let currentPage = 1;
        const productsPerPage = 5;

        // Initialize the table
        function initializeTable() {
            // In a real application, you would fetch products from your database
            // For demonstration, we'll simulate loading products
            loadProducts();
            setupEventListeners();
        }

        // Simulate loading products from database
        function loadProducts() {
            // In your actual implementation, you would fetch from your Laravel backend
            // Example: fetch('/api/products').then(response => response.json()).then(data => {...})
            
            // For now, we'll simulate an empty state
            allProducts = [];
            filteredProducts = [];
            updateStats();
            renderTable();
            updateProductCount();
        }

        // Render the table with current products
        function renderTable() {
            const tableBody = document.getElementById('tableBody');
            tableBody.innerHTML = '';
            
            // Calculate pagination
            const startIndex = (currentPage - 1) * productsPerPage;
            const endIndex = startIndex + productsPerPage;
            const productsToShow = filteredProducts.slice(startIndex, endIndex);
            
            if (productsToShow.length === 0) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <i class="fas fa-search fa-2x mb-2 text-muted"></i>
                            <p class="text-muted">No products found matching your criteria</p>
                        </td>
                    </tr>
                `;
                return;
            }
            
            productsToShow.forEach(product => {
                const row = document.createElement('tr');
                const stockPercentage = (product.quantity_in_stock / product.min_stock_level) * 100;
                const progressBarClass = stockPercentage >= 80 ? 'bg-success' : 
                                        stockPercentage >= 30 ? 'bg-warning' : 'bg-danger';
                
                row.innerHTML = `
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="${product.image_url || 'https://via.placeholder.com/50'}" alt="Product" class="product-image me-3">
                            <div>
                                <div class="fw-bold">${product.product_name}</div>
                                <small class="text-muted">${product.short_description || 'No description'}</small>
                            </div>
                        </div>
                    </td>
                    <td>${product.sku}</td>
                    <td>
                        <div>$${parseFloat(product.price).toFixed(2)} ${product.discount_price > 0 ? `<small class="text-muted"><s>$${parseFloat(product.discount_price).toFixed(2)}</s></small>` : ''}</div>
                        ${product.discount_price > 0 ? `<span class="discount-badge">Save $${(parseFloat(product.discount_price) - parseFloat(product.price)).toFixed(2)}</span>` : ''}
                    </td>
                    <td>
                        <div class="${product.quantity_in_stock < product.min_stock_level ? 'stock-low' : ''}">${product.quantity_in_stock} <span class="text-muted">/ ${product.min_stock_level} min</span></div>
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar ${progressBarClass}" style="width: ${Math.min(stockPercentage, 100)}%"></div>
                        </div>
                    </td>
                    <td><span class="status-badge status-${product.status}">${product.status.charAt(0).toUpperCase() + product.status.slice(1)}</span></td>
                    <td><span class="status-badge status-${product.is_active === 'active' ? 'active' : 'deactive'}">${product.is_active === 'active' ? 'Active' : 'Deactive'}</span></td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-action btn-view" data-id="${product.id}">
                                <i class="fas fa-eye"></i> View
                            </button>
                            <button class="btn btn-action btn-edit" data-id="${product.id}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-action btn-delete" data-id="${product.id}">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                    </td>
                `;
                tableBody.appendChild(row);
            });
            
            updatePagination();
        }

        // Update product count display
        function updateProductCount() {
            const countElement = document.getElementById('productCount');
            countElement.textContent = `Showing ${Math.min(filteredProducts.length, productsPerPage)} of ${filteredProducts.length} products`;
            
            const paginationInfo = document.getElementById('paginationInfo');
            const startIndex = (currentPage - 1) * productsPerPage + 1;
            const endIndex = Math.min(startIndex + productsPerPage - 1, filteredProducts.length);
            paginationInfo.textContent = `Showing ${startIndex} to ${endIndex} of ${filteredProducts.length} entries`;
        }

        // Update stats cards
        function updateStats() {
            document.getElementById('totalProducts').textContent = allProducts.length;
            document.getElementById('activeProducts').textContent = allProducts.filter(p => p.is_active === 'active').length;
            document.getElementById('pendingProducts').textContent = allProducts.filter(p => p.status === 'pending').length;
            document.getElementById('lowStockProducts').textContent = allProducts.filter(p => p.quantity_in_stock < p.min_stock_level).length;
        }

        // Update pagination controls
        function updatePagination() {
            const totalPages = Math.ceil(filteredProducts.length / productsPerPage);
            const paginationElement = document.getElementById('pagination');
            
            if (totalPages <= 1) {
                paginationElement.style.display = 'none';
                return;
            }
            
            paginationElement.style.display = 'flex';
            
            // Clear existing page items (keep prev and next)
            const pageItems = paginationElement.querySelectorAll('.page-item:not(#prevPage):not(#nextPage)');
            pageItems.forEach(item => item.remove());
            
            // Add page numbers
            const prevItem = document.getElementById('prevPage').parentElement;
            
            for (let i = 1; i <= totalPages; i++) {
                const pageItem = document.createElement('li');
                pageItem.className = `page-item ${i === currentPage ? 'active' : ''}`;
                pageItem.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                
                pageItem.addEventListener('click', (e) => {
                    e.preventDefault();
                    currentPage = i;
                    renderTable();
                    updateProductCount();
                });
                
                prevItem.after(pageItem);
            }
            
            // Update prev/next buttons
            const prevPageBtn = document.getElementById('prevPage');
            const nextPageBtn = document.getElementById('nextPage');
            
            prevPageBtn.parentElement.classList.toggle('disabled', currentPage === 1);
            nextPageBtn.parentElement.classList.toggle('disabled', currentPage === totalPages);
            
            prevPageBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage--;
                    renderTable();
                    updateProductCount();
                }
            });
            
            nextPageBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (currentPage < totalPages) {
                    currentPage++;
                    renderTable();
                    updateProductCount();
                }
            });
        }

        // Filter products based on current criteria
        function filterProducts() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            const activeFilter = document.getElementById('activeFilter').value;
            
            filteredProducts = allProducts.filter(product => {
                // Search filter
                const matchesSearch = product.product_name.toLowerCase().includes(searchTerm) || 
                                     product.sku.toLowerCase().includes(searchTerm) ||
                                     (product.short_description && product.short_description.toLowerCase().includes(searchTerm));
                
                // Status filter
                const matchesStatus = statusFilter === 'all' || product.status === statusFilter;
                
                // Active filter
                const matchesActive = activeFilter === 'all' || product.is_active === activeFilter;
                
                return matchesSearch && matchesStatus && matchesActive;
            });
            
            // Apply current sort if any
            if (currentSort === 'priceLowHigh') {
                filteredProducts.sort((a, b) => parseFloat(a.price) - parseFloat(b.price));
            } else if (currentSort === 'priceHighLow') {
                filteredProducts.sort((a, b) => parseFloat(b.price) - parseFloat(a.price));
            }
            
            currentPage = 1; // Reset to first page when filters change
            renderTable();
            updateProductCount();
            updateActiveFilters();
        }

        // Update active filters display
        function updateActiveFilters() {
            const activeFiltersContainer = document.getElementById('activeFilters');
            activeFiltersContainer.innerHTML = '';
            
            const searchTerm = document.getElementById('searchInput').value;
            const statusFilter = document.getElementById('statusFilter').value;
            const activeFilter = document.getElementById('activeFilter').value;
            
            if (searchTerm) {
                addFilterTag('Search: ' + searchTerm, () => {
                    document.getElementById('searchInput').value = '';
                    filterProducts();
                });
            }
            
            if (statusFilter !== 'all') {
                addFilterTag('Status: ' + statusFilter.charAt(0).toUpperCase() + statusFilter.slice(1), () => {
                    document.getElementById('statusFilter').value = 'all';
                    filterProducts();
                });
            }
            
            if (activeFilter !== 'all') {
                const activeText = activeFilter === 'active' ? 'Active' : 'Deactive';
                addFilterTag('Active: ' + activeText, () => {
                    document.getElementById('activeFilter').value = 'all';
                    filterProducts();
                });
            }
            
            if (currentSort) {
                const sortText = currentSort === 'priceLowHigh' ? 'Price: Low to High' : 'Price: High to Low';
                addFilterTag(sortText, () => {
                    currentSort = null;
                    document.getElementById('priceLowHigh').classList.remove('active');
                    document.getElementById('priceHighLow').classList.remove('active');
                    filterProducts();
                });
            }
            
            function addFilterTag(text, onClick) {
                const tag = document.createElement('div');
                tag.className = 'filter-tag';
                tag.innerHTML = `
                    ${text}
                    <span class="close">&times;</span>
                `;
                
                tag.querySelector('.close').addEventListener('click', onClick);
                activeFiltersContainer.appendChild(tag);
            }
        }

        // Set up event listeners
        function setupEventListeners() {
            // Search input
            document.getElementById('searchInput').addEventListener('input', filterProducts);
            
            // Filter selects
            document.getElementById('statusFilter').addEventListener('change', filterProducts);
            document.getElementById('activeFilter').addEventListener('change', filterProducts);
            
            // Price sort buttons
            document.getElementById('priceLowHigh').addEventListener('click', () => {
                currentSort = 'priceLowHigh';
                document.getElementById('priceLowHigh').classList.add('active');
                document.getElementById('priceHighLow').classList.remove('active');
                filterProducts();
            });
            
            document.getElementById('priceHighLow').addEventListener('click', () => {
                currentSort = 'priceHighLow';
                document.getElementById('priceHighLow').classList.add('active');
                document.getElementById('priceLowHigh').classList.remove('active');
                filterProducts();
            });
            
            // Add product button
            document.getElementById('addProductBtn').addEventListener('click', () => {
                // Redirect to add product page
                window.location.href = '/products/create';
            });
            
            // Action buttons (delegated event handling)
            document.getElementById('tableBody').addEventListener('click', (e) => {
                if (e.target.closest('.btn-view')) {
                    const productId = e.target.closest('.btn-view').dataset.id;
                    // Redirect to view product page
                    window.location.href = `/products/${productId}`;
                } else if (e.target.closest('.btn-edit')) {
                    const productId = e.target.closest('.btn-edit').dataset.id;
                    // Redirect to edit product page
                    window.location.href = `/products/${productId}/edit`;
                } else if (e.target.closest('.btn-delete')) {
                    const productId = e.target.closest('.btn-delete').dataset.id;
                    if (confirm('Are you sure you want to delete this product?')) {
                        // Send delete request to server
                        deleteProduct(productId);
                    }
                }
            });
        }

        // Delete product function
        function deleteProduct(productId) {
            // In a real application, you would send a DELETE request to your server
            // Example: 
            // fetch(`/products/${productId}`, { method: 'DELETE' })
            //   .then(response => {
            //       if (response.ok) {
            //           // Remove product from local array and re-render
            //           allProducts = allProducts.filter(p => p.id != productId);
            //           filterProducts();
            //           updateStats();
            //       }
            //   });
            
            // For demonstration, we'll just show an alert
            alert(`Product with ID: ${productId} would be deleted.`);
        }

        // Function to load products from your database
        // This would be called when the page loads
        function loadProductsFromDatabase() {
            // In your actual implementation, you would fetch from your Laravel backend
            // Example: 
            // fetch('/api/products')
            //   .then(response => response.json())
            //   .then(data => {
            //       allProducts = data;
            //       filteredProducts = [...allProducts];
            //       updateStats();
            //       renderTable();
            //       updateProductCount();
            //   });
            
            // For now, we'll simulate an empty state
            console.log("Load products from database would be implemented here");
        }

        // Initialize the table when the page loads
        document.addEventListener('DOMContentLoaded', initializeTable);
        
        // Export functions for use in your Laravel application
        window.productManagement = {
            setProducts: function(products) {
                allProducts = products;
                filteredProducts = [...allProducts];
                updateStats();
                renderTable();
                updateProductCount();
            },
            refresh: function() {
                loadProductsFromDatabase();
            }
        };
    </script>
</body>
</html>

@endsection