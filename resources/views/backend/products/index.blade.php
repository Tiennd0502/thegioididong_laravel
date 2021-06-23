@extends('backend.master')
@section('title','Sản phẩm')

@section('content')
  <!-- Page Heading -->
	<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
				Quản lý sản phẩm
      </h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="" class="text-decoration-none ">
              <i class="fas fa-tachometer-alt mr-1"></i> 
              Trang chủ</a>
					</li>
					<li class="breadcrumb-item">
						<a href="{{ route($controllerName.'.index') }}" class="text-decoration-none ">
							Sản phẩm
						</a>
					</li>
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
      <form class="form-inline my-2 my-lg-0" action="" method="GET" id="js-ajax-filter">
        @csrf
        <input class="form-control mr-sm-2" value='{{ \Request::get('name')}}' type="text" name="name" id="js-name" placeholder="Tìm kiếm theo tên" style="width: 30%">

        <select id="js-category-id" data-name="search" name="category_id" class="form-control mr-2">
          <option value="" selected>Xem tất cả danh mục</option>
          @if (!empty($categories))
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{( \Request::get('category_id') == $category->id ) ? 'selected' :'' }}>{{ $category->name }}</option>
            @endforeach
          @endif
        </select>
        <select id="js-brand-id" name="brand_id" class="form-control mr-2" value='{{ \Request::get('category_id')}}'>
          <option value="" selected>Xem tất cả các thương hiệu</option>
          @if (!empty($brands))
            @foreach ($brands as $brand)
              <option value="{{ $brand->id }}" {{( \Request::get('brand_id') == $brand->id ) ? 'selected' :'' }}>{{ $brand->name }}</option>
            @endforeach
          @endif
        </select>
        <button type="submit" id="js-search" data-position="filter-admin" class="btn btn-dark my-2 my-sm-0" type="submit" name="search"><i class="fas fa-search"></i></button>
      </form>
    </div>
    <div class="col-md-2 text-right">
      <a href="{{ route($controllerName . '.create') }}" class="text-success p-2" data-toggle="tooltip" data-placement="top"
        title="Thêm mới"><i class="fad fa-2x fa-plus-circle"></i></a>
      </div>
  </div>
  <!-- Danh sách sản phẩm -->
  @include('backend.products.list')

  {{ $items->links() }}
  <button type="button" class="btn btn-outline-dark" id="js-selectAll">Chọn tất cả</button>
  <button type="button" class="btn btn-outline-dark" id="js-deselectAll">Bỏ chọn tất cả</button>
  <button type="submit" class="btn btn-outline-dark">Xóa các mục đã chọn</button>
  <a href="{{ route($controllerName.'.create') }}" class="btn btn-success" >Thêm sản phẩm</a>
@endsection