  <!-- Sidebar Navigation-->
  <nav id="sidebar">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center m-5">
        <div class="avatar"><img    width="300px" src="{{ asset('/admincss/img/jahid.jpg') }}" alt="..."
                class="img-fluid rounded-circle"></div>
        <div class="title mx-3">
            <h1 class="h5">Jahid</h1>
            <p>Web Designer</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading mx-5">Main</span>
    <ul class="list-unstyled mx-5">
        <li class="active"><a href="/admin/dashboard"> <i class="icon-home"></i>Home </a></li>
        <li>
            <a href="#categoryDropdown" aria-expanded="false" data-toggle="collapse">
                <i class="icon-windows"></i> Category
            </a>
            <ul id="categoryDropdown" class="collapse list-unstyled">
                <li><a href="{{ url('add_category') }}">Add Category</a></li>
                <li><a href="{{ url('category_view') }}">View Category</a></li>
            </ul>
        </li>
        <li>
            <a href="#productDropdown" aria-expanded="false" data-toggle="collapse">
                <i class="icon-windows"></i> Product
            </a>
            <ul id="productDropdown" class="collapse list-unstyled">
                <li><a href="{{ url('add_product') }}">Add Product</a></li>
                <li><a href="{{ url('show_product') }}">Show Product</a></li>
            </ul>
        </li>
        
        <li><a href="{{url('view_orders')}}"> <i class="icon-grid"></i>Orders</a></li>
        <li><a href="{{url('users')}}"> <i class="fa-regular fa-user"></i></i>Users</a></li>

       </ul>
</nav>