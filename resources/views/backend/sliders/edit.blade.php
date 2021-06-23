@extends('backend.master')
@section('title', 'Sửa slide')
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
            <a href="{{ route($controllerName . '.index') }}" class="text-decoration-none ">
              Slider
            </a>
          </li>
          <li class="breadcrumb-item active">
            <span>Sửa slider</span>
          </li>
        </ol>
      </nav>
    </div>
  </div>
  @if (session('message'))
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
  <!-- form edit slider -->
  <form action="{{ route($controllerName . '.update', $item->id) }}" method="POST" id="createSlider" autocomplete="off"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="modified_by" value='' id="modified_by">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="page">Trang hiển thị</label>
        <select id="page" class="form-control" name="page_id">
          <option value="">Chọn trang hiển thị</option>
          @foreach ($pages as $page)
            <option value="{{ $page->id }}" {{ old('page_id') == $page->id || $item->page_id == $page->id ? 'selected' : '' }}>
              {{ $page->name }}</option>
          @endforeach
        </select>
        @error('page_id')
          <div class="error-text">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label for="exampleInputName">Tên Slider</label>
        <input type="text" name="name" class="form-control"
          value='{{ !empty(old('name')) ? old('name') : $item->name }}' id="exampleInputName" placeholder="Tên slider">
        @error('name')
          <div class="error-text">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label for="link">Link</label>
        <input type="text" name='link' class="form-control"
          value='{{ !empty(old('link')) ? old('link') : $item->link }}' id="link" placeholder="Link">
        @error('link')
          <div class="error-text">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="form-group col-md-6">
        <label for="position">Xuất hiện thứ</label>
        <input type="number" name="position" class="form-control" value='{{ old('position',$item->position) }}' id="position"
          placeholder="Thứ tự xuất hiện">
        @error('position')
          <div class="error-text">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="form-group col-md-6 ">
        <div class="form-upload" id="Avatar">
          <label class="insert-attach" for="image-avatar"><i class="fas fa-camera-retro mr-2"></i> Hình ảnh</label>
        </div>
        <div class="list-attach">
          <ul class="attach-view">
            <li class="img-box">
              <input type="hidden" name="linkImage" value="">
              <span class="icon-close" data-edit='{{ $item->avatar }}'><i class="fas fa-times-circle"></i></span>
              <img src="{{ asset('images/sliders' . $item->avatar) }}" alt="">
            </li>
            <li class="img-box d-none">
              <input type="file" id="image-avatar" value="" name="avatar" class="form-control js-image-item d-none">
              <span class="icon-close"><i class="fas fa-times-circle"></i></span>
              <img src="" class="delete_img">
            </li>
            <li class="" id="insert-attach-image">
              <label class="insert-attach" for="image-avatar"><i class="fas fa-plus"></i></label>
            </li>
          </ul>
        </div>
        @error('image')
        <div class="error-text">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label for="active">Trạng thái</label>
        <select id="active" class="form-control" name="active">
          <option value="1" {{ old('active') == "1" || $item->active == "1" ? 'selected' : '' }}>Hiện</option>
          <option value="0" {{ old('active') == "0" || $item->active == "0" ? 'selected' : '' }}>Ẩn</option>
        </select>
      </div>
    </div>
    <button type="submit" name="create" class="btn btn-primary">Lưu lại</button>
    <button type="reset" class="btn btn-primary">Nhập lại</button>
    <a href="{{ route($controllerName . '.index') }}" class="btn btn-primary">Danh sách slider</a>
  </form>
@endsection
