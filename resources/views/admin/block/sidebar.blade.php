<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
  <h3><a href="{{route('home')}}">Out Side</a></h3>
  </div>

  <!-- search form (Optional) -->
  <!-- 
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
    </div>
  </form>
   -->
  <!-- /.search form -->

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links 
    <li><a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li> -->
    
    <li><a href="{{ route('admin.contact.getList') }}"><i class="fa fa-envelope"></i> <span>Contact</span></a></li>
          
    <li class="treeview">
      <a href="{{ url('admin/order/order-new') }}"><i class="fa fa-cart-plus"></i> <span>Đơn hàng</span></a>
    </li>
             
    <li class="treeview">
      <a href="#"><i class="fa fa-eyedropper"></i> <span>Blogs</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="{{ url('admin/blog/list') }}">All Post</a></li>
        <li class="active"><a href="{{ url('admin/blog/add') }}">Add New Post</a></li>
      </ul>
    </li>
        
    <li class="treeview">
      <a href="#"><i class="fa fa-odnoklassniki"></i> <span>Systems</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="{{ url('admin/system/about') }}">About</a></li>
        <li><a href="{{ url('admin/system/contact') }}">Contact</a></li>
        <li><a href="{{ url('admin/system/slide-list') }}">List Slide</a></li>
        <li><a href="{{ url('admin/system/slide-add') }}">Add New Slide</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#"><i class="fa fa-users"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="{{ url('admin/user/list') }}">List User</a></li>
        <li><a href="{{ url('admin/user/add') }}">Add New User</a></li>
      </ul>
    </li>
    
     <li class="treeview">
      <a href="#"><i class="fa fa-picture-o"></i> <span>Images</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="{{ url('admin/upload/list') }}">Library</a></li>
        <li><a href="{{ url('admin/upload/add') }}">Add New</a></li>
      </ul>
    </li>
    
    <li class="treeview">
      <a href="#"><i class="fa fa-credit-card"></i> <span>Categories</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="{{ url('admin/cate/list') }}">List Category</a></li>
        <li><a href="{{ url('admin/cate/add') }}">Add New Category</a></li>
      </ul>
    </li>
    
    <li class="treeview">
      <a href="#"><i class="fa fa-apple"></i> <span>Products</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
      	<li><a href="{{ url('admin/product/color') }}">Colors</a></li>
      	<li><a href="{{ url('admin/product/size') }}">Sizes</a></li>
        <li><a href="{{ url('admin/product/list') }}">List Product</a></li>
        <li><a href="{{ url('admin/product/add') }}">Add New Product</a></li>
      </ul>
    </li>
  </ul>
  <!-- /.sidebar-menu -->
</section>