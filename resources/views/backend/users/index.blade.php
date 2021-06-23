@extends('backend.master')
@section('content')
  <!-- Page Heading -->
	<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
				Sản phẩm
        {{-- <small class="text-secondary">Thống kê tổng quan</small> --}}
      </h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{ route('category.index') }}" class="text-decoration-none "><i class="fas fa-tachometer-alt mr-1"></i>
							Sản phẩm
						</a>
					</li>
					{{-- <li class="breadcrumb-item">
						<a href="" class="text-decoration-none ">Danh mục2</a>
					</li> --}}
					<li class="breadcrumb-item active">
						<span>Danh sách sản phẩm</span>
					</li>
        </ol>
      </nav>
    </div>
  </div>
  @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('message')}} </strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  <div class="row mb-2">
    <div class="col-10 ">
      <form class="form-inline my-2 my-lg-0" action="" method="POST">
        <input class="form-control mr-sm-2" type="search" name="name" placeholder="Tìm kiếm theo tên" aria-label="Search" style="width: 30%">
        <select id="categoryId" data-name="search" name="category_id" class="form-control mr-2">
          <option value="0" selected>Xem tất cả các sản phẩm</option>
          @foreach ($categories as $category)
            @if (!empty($category->icon))
             <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
          @endforeach
        </select>
        <select id="brandId" name="brand_id" class="form-control mr-2">
          <option value="0" selected>Xem tất cả các thương hiệu</option>
        </select>
        <button class="btn btn-dark my-2 my-sm-0" type="submit" name="search"><i class="fas fa-search"></i></button>
      </form>
    </div>
    <div class="col-md-2 text-right">
      <a href="{{ route('product.create') }}" class="btn btn-success" >Thêm sản phẩm</a>
    </div>
  </div>
  <div class="table-responsive mt-4">
    <table class="table table-hover">
      <thead class="text-left text-uppercase">
        <tr>
          <th><input type="checkbox" name="selectAll"></th>
          <th>Hình ảnh</th>
          <th>Tên</th>
          <th>Giá</th>
          <th class="text-center">Lượt xem</th>
          <th>Xem chi tiết</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
         
        @foreach ($products as $product) 
          <tr>
            <td><input type="checkbox" name="select[]"></td>
            <td><img src="{{ asset('images/products'.$product->image) }}" alt="IMG"></td>
            <td style="max-width: 400px;">{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td class="text-center">{{ $product->view }}</td>
            <td><a class="btn btn-outline-success" href="{{ route('product.show',$product->id ) }}">Xem chi tiết</a></td>
            <td>
              <a class="btn btn-outline-success" href="">Copy</a>
              <a class="btn btn-outline-primary" href="{{ route('product.edit',$product->id ) }}">Sửa</a>
              <form action="product/{{$product->id }}{{ isset($_GET['page']) ? '?page='.$_GET['page'] : ''}}" method="POST" class="d-inline-block">
                {{-- {{ route('category.destroy', $category->id ) }} --}}
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger">Xóa</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{ $products->links() }}
  <button type="button" class="btn btn-outline-dark" id="js-selectAll">Chọn tất cả</button>
  <button type="button" class="btn btn-outline-dark" id="js-deselectAll">Bỏ chọn tất cả</button>
  <button type="submit" class="btn btn-outline-dark">Xóa các mục đã chọn</button>
  <a href="{{ route('product.create') }}" class="btn btn-success" >Thêm sản phẩm</a>
@endsection