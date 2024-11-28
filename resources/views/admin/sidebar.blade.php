<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{asset('/admincss/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{url('admin/dashboard')}}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{url('view_category')}}"> <i class="icon-grid"></i>Category</a></li>
                
                <div id="accordion">
    <!-- Product -->
    <li>
        <a href="#productDropdown" aria-expanded="false" data-toggle="collapse" data-parent="#accordion"> 
            <i class="icon-windows"></i>Product
        </a>
        <ul id="productDropdown" class="collapse list-unstyled ">
            <li><a href="{{url('add_product')}}">Add Product</a></li>
            <li><a href="{{url('view_product')}}">View Product</a></li>
        </ul>
    </li>

    <!-- Order Management -->
    <li>
        <a href="#orderManagementDropdown" aria-expanded="false" data-toggle="collapse" data-parent="#accordion"> 
            <i class="icon-windows"></i>Order Management
        </a>
        <ul id="orderManagementDropdown" class="collapse list-unstyled ">
            <li><a href="#">Page</a></li>
            <li><a href="#">Page</a></li>
            <li><a href="#">Page</a></li>
        </ul>
    </li>
</div>

      </nav>