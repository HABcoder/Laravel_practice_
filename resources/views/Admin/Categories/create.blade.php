<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application - Mazer Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            --light-color: #f8f9fa;
            --dark-color: #212529;
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

   .header-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.15);
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        
        .category-card {
            border-left: 4px solid var(--primary-color);
        }
        
        .subcategory-card {
            border-left: 4px solid var(--success-color);
            margin-left: 30px;
            margin-top: 15px;
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
        }
        
        .btn-success {
            background-color: var(--success-color);
            border: none;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #6c757d;
        }
        
        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            padding: 25px;
            margin-bottom: 30px;
        }
        
        .section-title {
            color: var(--primary-color);
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        
        .category-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .toggle-subcategories {
            background: none;
            border: none;
            color: var(--primary-color);
            cursor: pointer;
        }
        
        .subcategories-container {
            margin-top: 15px;
            padding-left: 20px;
            border-left: 2px dashed #dee2e6;
        }
        
        .badge {
            background-color: var(--success-color);
        }
        
        .form-switch .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
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
                <a href="index.html" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Components</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="component-alert.html">Alert</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="component-badge.html">Badge</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="component-breadcrumb.html">Breadcrumb</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="component-button.html">Button</a>
                    </li>
                </ul>
            </li>
            
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Extra Components</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="extra-component-avatar.html">Avatar</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="extra-component-sweetalert.html">Sweet Alert</a>
                    </li>
                </ul>
            </li>
            
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Layouts</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="layout-default.html">Default Layout</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="layout-vertical-1-column.html">1 Column</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="layout-vertical-navbar.html">Vertical with Navbar</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="layout-horizontal.html">Horizontal Menu</a>
                    </li>
                </ul>
            </li>
            
            
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-hexagon-fill"></i>
                    <span>Form Elements</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="form-element-input.html">Input</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="form-element-input-group.html">Input Group</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="form-element-select.html">Select</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="form-element-radio.html">Radio</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="form-element-checkbox.html">Checkbox</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="form-element-textarea.html">Textarea</a>
                    </li>
                </ul>
            </li>
            
            
            
            <li class="sidebar-item  ">
                <a href="table.html" class='sidebar-link'>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Table</span>
                </a>
            </li>
            
            
            <li class="sidebar-title">Extra UI</li>
            
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-pentagon-fill"></i>
                    <span>Widgets</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="ui-widgets-chatbox.html">Chatbox</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="ui-widgets-pricing.html">Pricing</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="ui-widgets-todolist.html">To-do List</a>
                    </li>
                </ul>
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
            
            <li class="sidebar-item  ">
                <a href="ui-file-uploader.html" class='sidebar-link'>
                    <i class="bi bi-cloud-arrow-up-fill"></i>
                    <span>File Uploader</span>
                </a>
            </li>
            
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-map-fill"></i>
                    <span>Maps</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="ui-map-google-map.html">Google Map</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="ui-map-jsvectormap.html">JS Vector Map</a>
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
            
            <li class="sidebar-item  ">
                <a href="application-checkout.html" class='sidebar-link'>
                    <i class="bi bi-basket-fill"></i>
                    <span>Checkout Page</span>
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
                    <li class="submenu-item ">
                        <a href="error-500.html">500</a>
                    </li>
                </ul>
            </li>
            
            <li class="sidebar-title">Raise Support</li>
            
            <li class="sidebar-item  ">
                <a href="https://zuramai.github.io/mazer/docs" class='sidebar-link'>
                    <i class="bi bi-life-preserver"></i>
                    <span>Documentation</span>
                </a>
            </li>
            
            <li class="sidebar-item  ">
                <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                    <i class="bi bi-puzzle"></i>
                    <span>Contribute</span>
                </a>
            </li>
            
            <li class="sidebar-item  ">
                <a href="https://github.com/zuramai/mazer#donate" class='sidebar-link'>
                    <i class="bi bi-cash"></i>
                    <span>Donate</span>
                </a>
            </li>
            
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
 </div> 
    <div id="main">
        <div class="main_content">
         <div class="header-section mb-4 p-3 bg-primary text-white rounded">
        <h2><i class="fas fa-tags me-2"></i> Category Management</h2>
        <p class="mb-0">Manage your categories & subcategories</p>
    </div>

    <!-- Add Category Form -->
    <div class="row">
        <div class="col-lg-6">
            <div class="form-container p-3 border rounded bg-white shadow-sm">
                <h4 class="section-title mb-3"><i class="fas fa-plus-circle me-2"></i>Add Category</h4>
                <form action="{{route('categories.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="cat_name"class="form-control" placeholder="Enter category name">
                    </div>
                    <!-- <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter description" name="desp"></textarea>
                    </div> -->
                    <!-- <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">Active</label>
                    </div> -->
                    <button class="btn btn-primary w-100"><i class="fas fa-save me-1"></i> Save Category</button>
                </form>
            </div>
        </div>

        <!-- Add Subcategory Form -->
        <div class="col-lg-6">
            <div class="form-container p-3 border rounded bg-white shadow-sm">
                <h4 class="section-title mb-3"><i class="fas fa-layer-group me-2"></i>Add Subcategory</h4>
                <form action="{{route('subcategories.store')}}" method="POST">
                    @csrf
                   
                    <div class="mb-3">
                        <label class="form-label">Parent Category</label>
                        <select class="form-select" name="category_id">
                            <option selected disabled>Select category</option>
                              @foreach($all_category as $items)
                            <option value="{{$items->category_id}}">{{$items->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                     
                    <div class="mb-3">
                        <label class="form-label">Subcategory Name</label>
                        <input type="text" class="form-control" placeholder="Enter subcategory name" name="sub_cat_name">
                    </div>
                    <!-- <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter description"></textarea>
                    </div> -->
                    <button class="btn btn-success w-100"><i class="fas fa-plus me-1"></i> Add Subcategory</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Dummy Categories & Subcategories -->
<div class="form-container p-3 border rounded bg-white shadow-sm mt-4">
    <h4 class="section-title mb-3"><i class="fas fa-list me-2"></i> Categories & Subcategories</h4>

    <div class="row">
        @foreach($all_category as $item)
            <div class="col-md-4 mb-3"> 
                <div class="card border-start border-primary h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">
                                {{ $item->category_name }}
                                <span class="badge bg-primary">{{ $item->sub_categroy->count() }} Subcategories</span>
                            </h5>
                            <div>
                                <!-- Category Edit -->
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $item->category_id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <!-- Category Delete -->
                                <form action="{{ route('categories.destroy',$item->category_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Subcategories -->
                        <div class="ms-3 mt-2">
                            <h6>Subcategories:</h6>
                            <ul class="list-group list-group-flush">
                                @forelse($item->sub_categroy as $sub)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $sub->sub_category_name }}
                                        <div>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editSubCategoryModal{{ $sub->sub_category_id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('subcategories.destroy',$sub->sub_category_id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @empty
                                    <li class="list-group-item text-muted">No Subcategories</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category Edit Modal -->
            <div class="modal fade" id="editCategoryModal{{ $item->category_id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('categories.update',$item->category_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" name="category_name" class="form-control" value="{{ $item->category_name }}" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Subcategory Modals -->
    @foreach($all_category as $item)
        @foreach($item->sub_categroy as $sub)
            <div class="modal fade" id="editSubCategoryModal{{ $sub->sub_category_id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('subcategories.update',$sub->sub_category_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Subcategory</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" name="sub_category_name" class="form-control" value="{{ $sub->sub_category_name }}" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    @endforeach
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
