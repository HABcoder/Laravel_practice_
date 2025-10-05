<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application - Mazer Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.6/css/perfect-scrollbar.css" integrity="sha512-2xznCEl5y5T5huJ2hCmwhvVtIGVF1j/aNUEJwi/BzpWPKEzsZPGpwnP1JrIMmjPpQaVicWOYVu8QvAIg9hwv9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
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
        #sidebar.active .sidebar-wrapper {
    left: 0;
 }

 #sidebar:not(.active) .sidebar-wrapper {
    left: -300px;
 }

 #sidebar:not(.active)~#main {
    margin-left: 0;
 }

 .sidebar-wrapper {
    width: 300px;
    height: 100vh;
    position: fixed;
    top: 0;
    z-index: 10;
    overflow-y: auto;
    background-color: #fff;
    bottom: 0;
    transition: left .5s ease-out;
 }

 .sidebar-wrapper .sidebar-header {
    padding: 2rem 2rem 1rem;
    font-size: 2rem;
    font-weight: 700;
 }

 .sidebar-wrapper .sidebar-header img {
    height: 1.2rem;
 }

 .sidebar-wrapper .sidebar-toggler.x {
    position: absolute;
    right: 0;
    top: .5rem;
    display: none;
 }

 .sidebar-wrapper .menu {
    margin-top: 2rem;
    padding: 0 2rem;
    font-weight: 600;
 }

 .sidebar-wrapper .menu .sidebar-title {
    padding: 0 1rem;
    margin: 1.5rem 0 1rem;
    font-size: 1rem;
    list-style: none;
    font-weight: 600;
    color: #25396f;
 }

 .sidebar-wrapper .menu .sidebar-link {
    display: block;
    padding: .7rem 1rem;
    font-size: 1rem;
    display: flex;
    align-items: center;
    border-radius: .5rem;
    transition: all .5s;
    text-decoration: none;
    color: #25396f;
 }

 .sidebar-wrapper .menu .sidebar-link i,
 .sidebar-wrapper .menu .sidebar-link svg {
    color: #7c8db5;
 }

 .sidebar-wrapper .menu .sidebar-link span {
    margin-left: 1rem;
 }

 .sidebar-wrapper .menu .sidebar-link:hover {
    background-color: #f0f1f5;
 }

 .sidebar-wrapper .menu .sidebar-item {
    list-style: none;
    margin-top: .5rem;
    position: relative;
 }

 .sidebar-wrapper .menu .sidebar-item.has-sub .sidebar-link:after {
    content: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><path stroke="gray" stroke-width="1" d="M6 9l6 6 6-6"/></svg>');
    position: absolute;
    color: #ccc;
    right: 15px;
    top: 12px;
    display: block;
 }

 .sidebar-wrapper .menu .sidebar-item.active .sidebar-link {
    background-color: #435ebe;
 }

 .sidebar-wrapper .menu .sidebar-item.active .sidebar-link span {
    color: #fff;
 }

 .sidebar-wrapper .menu .sidebar-item.active .sidebar-link i,
 .sidebar-wrapper .menu .sidebar-item.active .sidebar-link svg {
    fill: #fff;
    color: #fff;
 }

 .sidebar-wrapper .menu .sidebar-item.active .sidebar-link.has-sub:after {
    content: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><path stroke="%23fff" stroke-width="1" d="M6 9l6 6 6-6"/></svg>');
 }

 .sidebar-wrapper .menu .submenu {
    list-style: none;
    display: none;
    transition: max-height 2s cubic-bezier(0, .55, .45, 1);
    overflow: hidden;
 }

 .sidebar-wrapper .menu .submenu.active {
    max-height: 999px;
    display: block;
 }

 .sidebar-wrapper .menu .submenu .submenu-item.active {
    position: relative;
 }

 .sidebar-wrapper .menu .submenu .submenu-item.active>a {
    color: #435ebe;
    font-weight: 700;
 }

 .sidebar-wrapper .menu .submenu .submenu-item a {
    padding: .7rem 2rem;
    display: block;
    color: #25396f;
    font-size: .85rem;
    font-weight: 600;
    letter-spacing: .5px;
    transition: all .3s;
 }

 .sidebar-wrapper .menu .submenu .submenu-item a:hover {
    margin-left: .3rem;
 }

 @media screen and (max-width: 1199px) {
    .sidebar-wrapper {
        position: absolute;
        left: -300px;
    }
    
    .sidebar-wrapper .sidebar-toggler.x {
        display: block;
    }
 }

     /* Main Content CSS */
        #main {
            margin-left: 300px;
            transition: margin-left 0.5s ease-out;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .main_content {
            padding: 2rem;
            /* margin-top: 90px;  */
        }

</style>
</head>

<body>
<div id="app">
 <div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" ></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li class="sidebar-item  ">
                <a href="/" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
           <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Product</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item  active">
                        <a href="{{ route('products.index') }}">Product Manage</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('products.create') }}">Add Product</a>
                    </li>
                </ul>
            </li>   
            
            <li class="sidebar-item ">
                <a href="{{ route('categories.index') }}" class='sidebar-link'>
                    <i class="bi bi-chat-dots-fill"></i>
                    <span>Categories</span>
                </a>
            </li> 
            
            <li class="sidebar-title">Forms &amp; Tables</li>
                        
            <li class="sidebar-item  ">
                <a href="form-layout.html" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Form Layout</span>
                </a>
            </li>
                      
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-bar-chart-fill"></i>
                    <span>Charts</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="ui-chart-chartjs.html">ChartJS</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="ui-chart-apexcharts.html">Apexcharts</a>
                    </li>
                </ul>
            </li>
                       
            <li class="sidebar-title">Pages</li>
            
            <li class="sidebar-item  ">
                <a href="application-email.html" class='sidebar-link'>
                    <i class="bi bi-envelope-fill"></i>
                    <span>Email Application</span>
                </a>
            </li>
            
            <li class="sidebar-item active ">
                <a href="application-chat.html" class='sidebar-link'>
                    <i class="bi bi-chat-dots-fill"></i>
                    <span>Chat Application</span>
                </a>
            </li>
            
            <li class="sidebar-item  ">
                <a href="application-gallery.html" class='sidebar-link'>
                    <i class="bi bi-image-fill"></i>
                    <span>Photo Gallery</span>
                </a>
            </li>
            
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-person-badge-fill"></i>
                    <span>Authentication</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="auth-login.html">Login</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="auth-register.html">Register</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="auth-forgot-password.html">Forgot Password</a>
                    </li>
                </ul>
            </li>
            
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-x-octagon-fill"></i>
                    <span>Errors</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="error-403.html">403</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="error-404.html">404</a>
                    </li>
                </ul>
            </li>
            
            <li class="sidebar-title">Raise Support</li>
            
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
 </div> 
    <div id="main">
     <div class="main_content">

<!-- Product Management Section -->
<div class="page-container">

  <!-- Page Header -->
  <div class="page-header mb-4">
    <h1 class="fw-bold text-primary">
      <i class="bi bi-box-seam-fill me-2"></i> Product Management
    </h1>
    <p class="text-muted">Easily manage your product inventory, stock, and status</p>
  </div>

  <!-- Stats Cards -->
  <div class="row g-4 mb-4">
    <div class="col-md-3 col-6">
      <div class="card border-0 shadow-sm text-center h-100">
        <div class="card-body">
          <i class="bi bi-box fs-1 text-primary mb-2"></i>
          <h5 class="fw-bold mb-0" id="totalProducts">120</h5>
          <small class="text-muted">Total Products</small>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="card border-0 shadow-sm text-center h-100">
        <div class="card-body">
          <i class="bi bi-check-circle-fill fs-1 text-success mb-2"></i>
          <h5 class="fw-bold mb-0" id="activeProducts">95</h5>
          <small class="text-muted">Active</small>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="card border-0 shadow-sm text-center h-100">
        <div class="card-body">
          <i class="bi bi-clock-history fs-1 text-warning mb-2"></i>
          <h5 class="fw-bold mb-0" id="pendingProducts">10</h5>
          <small class="text-muted">Pending</small>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="card border-0 shadow-sm text-center h-100">
        <div class="card-body">
          <i class="bi bi-exclamation-triangle-fill fs-1 text-danger mb-2"></i>
          <h5 class="fw-bold mb-0" id="lowStockProducts">15</h5>
          <small class="text-muted">Low Stock</small>
        </div>
      </div>
    </div>
  </div>

  <!-- Filters Section -->
  <div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
      <div class="row g-3 align-items-center">

        <!-- Search -->
        <div class="col-md-3">
          <div class="input-group">
            <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
            <input type="text" class="form-control" placeholder="Search products...">
          </div>
        </div>

        <!-- Status -->
        <div class="col-md-2">
          <select class="form-select">
            <option selected>All Status</option>
            <option>Pending</option>
            <option>Approved</option>
            <option>Rejected</option>
          </select>
        </div>

        <!-- Active / Deactive -->
        <div class="col-md-2">
          <select class="form-select">
            <option selected>All Active</option>
            <option>Active</option>
            <option>Deactive</option>
          </select>
        </div>

        <!-- Pricing Filter -->
        <div class="col-md-3">
          <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="number" class="form-control" placeholder="Min">
            <span class="input-group-text">-</span>
            <input type="number" class="form-control" placeholder="Max">
          </div>
        </div>

        <!-- Add Product Button -->
        <div class="col-md-2 text-md-end">
          <button class="btn btn-primary w-100">
            <i class="bi bi-plus-lg me-1"></i> Add Product
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Product List Table -->
  <div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0 fw-bold"><i class="bi bi-list-ul me-2"></i> Product List</h5>
      <small class="text-muted" id="productCount">Showing 2 of 120 products</small>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th>Product</th>
              <th>SKU</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Main Catgeory</th>
              <th>Status</th>
              <th>Active</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_prod as $prod)
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <img src="{{ asset('image/' . $prod->image_url) }}" class="rounded me-2" style="width:50px; height:50px; object-fit:cover;" alt="Product">
                  <span>{{$prod->product_name}}</span>
                </div>
              </td>
              <td>{{$prod->sku}}</td>
              <td>{{$prod->price}}</td>
              <td>{{$prod->quantity_in_stock}}</td>
             <td>{{ $prod->subCategory->category->category_name ?? 'No Category' }}</td>
              <td>{{$prod->status}}</td>
              <td>{{$prod->is_active}}</td>

              <td class="text-center">
                  <a href="{{ route('products.edit', $prod->product_id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <i class="fas fa-edit"></i>
                  </button>
                 <!-- Category Delete -->
                  <form action="{{ route('products.destroy',$prod->product_id) }}" method="POST" class="d-inline">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">
                        <i class="fas fa-trash"></i> Delete
                     </button>
                 </form>
              </td>
            </tr>
            @endforeach
            <!-- Sample Row -->
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <img src="https://via.placeholder.com/40" class="rounded me-2" alt="Product">
                  <span>Aloe Vera Gel</span>
                </div>
              </td>
              <td>AV-002</td>
              <td>$8.50</td>
              <td>10</td>
              <td><span class="badge bg-warning text-dark">Pending</span></td>
              <td><span class="badge bg-secondary">Deactive</span></td>
              <td class="text-center">
                <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

      </div>
   </div>
</div>


   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.6/perfect-scrollbar.min.js" integrity="sha512-gcLXgodlQJWRXhAyvb5ULNlBAcvjuufaOBRggyLCtCqez+9jW7MxP3Is/9serId1YmNZ0Lx1ewh9z2xBwwZeKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/js/bootstrap.min.js" integrity="sha512-nKXmKvJyiGQy343jatQlzDprflyB5c+tKCzGP3Uq67v+lmzfnZUi/ZT+fc6ITZfSC5HhaBKUIvr/nTLCV+7F+Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="assets/js/main.js"></script>
    <script>
        function slideToggle(t,e,o){0===t.clientHeight?j(t,e,o,!0):j(t,e,o)}function slideUp(t,e,o){j(t,e,o)}function slideDown(t,e,o){j(t,e,o,!0)}function j(t,e,o,i){void 0===e&&(e=400),void 0===i&&(i=!1),t.style.overflow="hidden",i&&(t.style.display="block");var p,l=window.getComputedStyle(t),n=parseFloat(l.getPropertyValue("height")),a=parseFloat(l.getPropertyValue("padding-top")),s=parseFloat(l.getPropertyValue("padding-bottom")),r=parseFloat(l.getPropertyValue("margin-top")),d=parseFloat(l.getPropertyValue("margin-bottom")),g=n/e,y=a/e,m=s/e,u=r/e,h=d/e;window.requestAnimationFrame(function l(x){void 0===p&&(p=x);var f=x-p;i?(t.style.height=g*f+"px",t.style.paddingTop=y*f+"px",t.style.paddingBottom=m*f+"px",t.style.marginTop=u*f+"px",t.style.marginBottom=h*f+"px"):(t.style.height=n-g*f+"px",t.style.paddingTop=a-y*f+"px",t.style.paddingBottom=s-m*f+"px",t.style.marginTop=r-u*f+"px",t.style.marginBottom=d-h*f+"px"),f>=e?(t.style.height="",t.style.paddingTop="",t.style.paddingBottom="",t.style.marginTop="",t.style.marginBottom="",t.style.overflow="",i||(t.style.display="none"),"function"==typeof o&&o()):window.requestAnimationFrame(l)})}

let sidebarItems = document.querySelectorAll('.sidebar-item.has-sub');
for(var i = 0; i < sidebarItems.length; i++) {
    let sidebarItem = sidebarItems[i];
	sidebarItems[i].querySelector('.sidebar-link').addEventListener('click', function(e) {
        e.preventDefault();
        
        let submenu = sidebarItem.querySelector('.submenu');
        if( submenu.classList.contains('active') ) submenu.style.display = "block"

        if( submenu.style.display == "none" ) submenu.classList.add('active')
        else submenu.classList.remove('active')
        slideToggle(submenu, 300)
    })
}

window.addEventListener('DOMContentLoaded', (event) => {
    var w = window.innerWidth;
    if(w < 1200) {
        document.getElementById('sidebar').classList.remove('active');
    }
});
window.addEventListener('resize', (event) => {
    var w = window.innerWidth;
    if(w < 1200) {
        document.getElementById('sidebar').classList.remove('active');
    }else{
        document.getElementById('sidebar').classList.add('active');
    }
});

document.querySelector('.burger-btn').addEventListener('click', () => {
    document.getElementById('sidebar').classList.toggle('active');
})
document.querySelector('.sidebar-hide').addEventListener('click', () => {
    document.getElementById('sidebar').classList.toggle('active');

})


// Perfect Scrollbar Init
if(typeof PerfectScrollbar == 'function') {
    const container = document.querySelector(".sidebar-wrapper");
    const ps = new PerfectScrollbar(container, {
        wheelPropagation: false
    });
}

// Scroll into active sidebar
document.querySelector('.sidebar-item.active').scrollIntoView(false)
    </script>
</body>

</html>
