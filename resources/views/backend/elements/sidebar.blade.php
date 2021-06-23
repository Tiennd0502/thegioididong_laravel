<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="nav navbar-nav side-nav flex-column">
    {{-- <li class="nav-item {{ ($current_page == 'dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.showDashboard')}}"><i class="fas fa-tachometer-alt"></i> Tổng quan<span class="sr-only">(current)</span></a>
    </li> --}}
    <li class="nav-item {{ ($current_page == 'page') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('page.index')}}"><i class="fad fa-copy"></i> Trang<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item {{ ($current_page == 'slider') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('slider.index') }}"><i class="far fa-images"></i> Slider</a>
    </li>
    <li class="nav-item {{ ($current_page == 'category') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('category.index')}}"><i class="fad fa-list"></i> Danh mục </a> 
    </li>
    <li class="nav-item {{ ($current_page == 'brand') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('brand.index')}}"><i class="fas fa-trademark"></i> Thương hiệu </a> 
    </li>
    <li class="nav-item {{ ($current_page == 'product') ? 'active' : '' }}">
      <a class="nav-link " href="{{ route('product.index')}}"><i class="fab fa-product-hunt"></i> Sản phẩm</a>
    </li>
    <li class="nav-item {{ ($current_page == 'articles') ? 'active' : '' }}">
      <a class="nav-link " href="{{ route('article.index')}}"><i class="fas fa-file-edit"></i> Bài viết</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="custumer"><i class="fas fa-users"></i> Khách hàng</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="evaluate"><i class="fas fa-comment-alt-check"></i> Đánh giá</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="order"><i class="fas fa-truck-pickup"></i> Đơn hàng</a>
    </li>
    <li class="nav-item {{ ($current_page == 'user') ? 'active' : '' }}">
      <a class="nav-link" href="user"><i class="fas fa-users-cog"></i> Thành viên</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="privilege"><i class="fas fa-users-cog"></i> Phân quyền</a>
    </li>
  </ul>
</div>