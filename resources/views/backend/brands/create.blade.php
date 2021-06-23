@extends('backend.master')
@section('title','Thêm thương hiệu')

@section('content')
  <!-- Page Heading -->
	<div class="row">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="" class="text-decoration-none ">
              <i class="fas fa-tachometer-alt mr-1"></i> 
              Trang chủ</a>
					</li>
					<li class="breadcrumb-item">
						<a href="{{ route($controllerName.'.index') }}" class="text-decoration-none ">
							Thương hiệu
						</a>
					</li>
					<li class="breadcrumb-item active">
						<span>Thêm thương hiệu</span>
					</li>
        </ol>
      </nav>
    </div>
  </div>
  @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('message') }} </strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
	@if (session('error'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>{{ session('error') }} </strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
	<!-- form thêm thương hiệu -->
	<form action="{{ route($controllerName.'.store') }}" method="POST" id="createCategory" autocomplete="off" enctype="multipart/form-data">
		@csrf
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="parentId">Danh mục</label>
				<select id="parentId" name="category_id" class="form-control" >
					<option value="">Chọn danh mục</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ (old('category_id') == $category->id ) ? 'selected' :'' }}>{{ $category->name }}</option>
          @endforeach
				</select>
				@error('category_id')
					<div class="error-text">
            {{ $message}}
					</div>
				@enderror
			</div>
			<div class="form-group col-md-6">
				<label for="exampleInputName">Tên thương hiệu</label>
				<input type="text" name="name" class="form-control" value='{{ old('name') }}' id="exampleInputName" placeholder="Tên thương hiệu">
				@error('name')
					<div class='error-text'> {{ $message }} </div>
				@enderror
			</div>
      <div class="form-group col-md-6">
				<label for="position">Vị trí</label>
				<input type="text" name="position" class="form-control" value='{{ old('position') }}' id="position" placeholder="Vị trí hiển thị">
				@error('position')
					<div class='error-text'> {{ $message }} </div>
				@enderror
			</div>
      <div class="form-group col-md-6 ">
        <div class="form-upload" id="image">
          <label class="insert-attach" for="image-item"><i class="fas fa-camera-retro mr-2"></i> Logo (chỉ chọn 1 ảnh)</label>
        </div>
        <div class="list-attach">
          <ul class="attach-view" id="attach-view-image">
            <li class="img-box d-none">
              <input type="file" id="image-item" value="" name="avatar" class="form-control js-image-item d-none">
              <span class="icon-close" ><i class="fas fa-times-circle"></i></span>
              <img src="" class="delete_img">
            </li>
            <li class="" id="insert-attach-image">
              <label class="insert-attach" for="image-item"><i class="fas fa-plus"></i></label>
            </li>
          </ul>
				</div>
				@error('image')
					<div class='error-text'> {{ $message }} </div>
				@enderror
			</div>
		</div>
    <button type="submit" name="create" class="btn btn-primary">Lưu lại</button>
    <button type="reset" class="btn btn-primary">Nhập lại</button>
    <a href="{{ route($controllerName.'.index')}}" class="btn btn-primary">Danh sách thương hiệu</a>
  </form>
@endsection