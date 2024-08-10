  <!-- Sidebar Navigation-->
  <nav id="sidebar">
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
        <li><a href="{{url('category_view')}}"> <i class="icon-grid"></i>Category</a></li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-windows"></i> Product </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{url('add_product')}}">Add Product</a></li>
                <li><a href="{{url('show_product')}}">Show Product</a></li>
            </ul>
        </li>
        <li><a href="{{url('view_orders')}}"> <i class="icon-grid"></i>Orders</a></li>

       </ul>
</nav>