@extends('backend.master')
@section('title', 'Sửa danh mục')

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
							Danh mục
						</a>
					</li>
					<li class="breadcrumb-item active">
						<span>Sửa danh mục</span>
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
	@if (session('error'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>{{ session('error') }} </strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
	<!-- form thêm danh mục -->
	<form action="{{ route($controllerName.'.update', $item->id) }}" method="POST" id="createCategory" autocomplete="off" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="exampleInputName">Tên danh mục</label>
				<input type="text" name="name" class="form-control" value='{{ old('name',$item->name)}}' id="exampleInputName" placeholder="Tên danh mục">
				@error('name')
					<div class='error-text'> {{ $message }} </div>
				@enderror
			</div>
			<div class="form-group col-md-6">
				<label for="exampleInputName">Tên danh mục</label>
				<input type="text" name="slug" class="form-control" value='{{ $item->slug}}' id="slug" readonly>
			</div>
			<div class="form-group col-md-6">
        <label for="status">Trạng thái</label>
        <select id="status" class="form-control" name="status">
          <option value="0" {{($item->status == 0) ? ' selected': ''}}>Ẩn</option>
          <option value="1" {{($item->status == 1) ? ' selected': ''}}>Hiện</option>
        </select>
      </div>
      <div class="form-group col-md-6">
				<label for="position">Vị trí</label>
				<input type="text" name="position" class="form-control" value='{{ old('position',$item->position) }}' id="position" placeholder="Vị trí xuất hiện">
				@error('position')
					<div class='error-text'> {{ $message }} </div>
				@enderror
			</div>
			
			<div class="form-group col-md-6">
				<label for="title_seo">Meta title</label>
				<input type="text" name="title_seo" class="form-control" value='{{ old('title_seo',$item->title_seo) }}' id="title_seo" placeholder="Title">
			</div>
			<div class="form-group col-md-6">
				<label for="description_seo">Meta description</label>
				<input type="text" name="description_seo" class="form-control" value='{{ old('description_seo',$item->description_seo) }}' id="description_seo" placeholder="Description">
			</div>
			<div class="form-group col-md-6">
				<label for="keyword_seo">Meta keywords</label>
				<input type="text" name="keyword_seo" class="form-control" value='{{ old('keyword_seo',$item->keyword_seo) }}' id="keyword_seo" placeholder="Keywords">
			</div>
			
			<div class="form-group col-md-6" >
				<label class="d-block" for="icon">Icon (Vui lòng chọn icon trong <a href="https://fontawesome.com/icons?m=free" target="_blank">fontawesome.com</a>)</label>
				<input type="text" name="icon" class="form-control w-50 d-inline-block" value='{{ old('icon', $item->icon) }}' id="icon" placeholder='<i class="fas fa-tasks"></i>'>
				<div class="d-inline-block w-25 ml-3" id="edit-icon" style="font-size: 22px">{!! old('icon', $item->icon) !!}</div>
			</div>
		</div>
    <button type="submit" name="update" class="btn btn-primary">Lưu lại</button>
    <button type="reset" class="btn btn-primary">Nhập lại</button>
    <a href="{{ route($controllerName.'.index')}}" class="btn btn-primary">Danh sách danh mục</a>
  </form>
@endsection