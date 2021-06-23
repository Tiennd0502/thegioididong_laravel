@extends('backend.master')
@section('title', 'Sửa bài viết')

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
              Bài viết
            </a>
          </li>
          <li class="breadcrumb-item active">
            <span>Sửa bài viết</span>
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
  <form action="{{ route($controllerName . '.update',$item->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="created_by" value='0'>
    <div class="row">
      <div class="col-lg-8">
        <div class="form-group">
          <label for="Name">Tiêu đề </label>
          <input type="text" name="name" class="form-control" value="{{ old('name',$item->name) }}" id="Name"
            placeholder="Tiêu đề bài viết">
          @error('name')
            <div class='error-text'> {{ $message }} </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Viết mô tả rút gọn</label>
          <textarea class="form-control" id="description" rows="4" name='description'> {{ old("description",$item->description)}}</textarea>
          @error('description')
            <div class='error-text'> {{ $message }} </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="title_seo">Metal title</label>
          <input type="text" name="title_seo" class="form-control" value="{{ old('title_seo',$item->title_seo) }}" id="title_seo" placeholder="Meta title">
          @error('title_seo')
            <div class='error-text'> {{ $message }} </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="description_seo">Meta description</label>
          <input type="text" name="description_seo" class="form-control" value="{{ old('description_seo',$item->description_seo) }}"
            id="description_seo" placeholder="Meta description ">
          @error('description_seo')
            <div class='error-text'> {{ $message }} </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="keyword_seo">Meta Keyword</label>
          <input type="text" name="keyword_seo" class="form-control" value="{{ old('keyword_seo',$item->keyword_seo) }}" id="keyword_seo"
            placeholder="Meta keyword">
        </div>
        <div class="form-group">
          <label for="Content">Nội dung bài viết</label>
          <textarea name="content" id="Content">
              {{ old('content',$item->content) }}
            </textarea>
          @error('content')
            <div class='error-text'> {{ $message }} </div>
          @enderror
        </div>
      </div>
      <div class="col-md-4 border-left">
        <div class="form-group mb-3 ">
          <label for="category">Danh mục bài viết</label>
          <select id="js-category-id" name="category_id" class="form-control">
            <option value="">Chọn danh mục bài viết</option>
            {{-- @if (!empty($categories))
              @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                  {{ $category->name }}</option>
              @endforeach
            @endif --}}
          </select>
          @error('category_id')
            <div class='error-text'> {{ $message }} </div>
          @enderror
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox"  id="active" value='1' name='active' {{ old('active',$item->active) == 1 ? 'checked' :''}} >
          <label class="form-check-label" for="active">
            Hiển thị công khai
          </label>
        </div>
        <div class="form-group ">
          <div class="form-upload" id="Avatar">
            <label class="insert-attach" for="image-avatar"><i class="fas fa-camera-retro mr-2"></i> Ảnh đại diện( Chỉ chọn 1 ảnh)</label>
          </div>
          <div class="list-attach">
            <ul class="attach-view">
              <li class="img-box">
                <input type="hidden" name="linkImage" value="">
                <span class="icon-close" data-edit='{{ $item->avatar }}'><i class="fas fa-times-circle"></i></span>
                <img src="{{ asset('images/articles' . $item->avatar) }}" alt="">
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
          @error('avatar')
            <span class="invalid-feedback mt-1" role="alert" style="display:block">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="form-group">
      <button type="submit" name="create" class="btn btn-primary" id="submitProduct">Lưu lại</button>
      <button type="reset" class="btn btn-primary">Nhập lại</button>
      <a href="{{ route($controllerName . '.index') }}" class="btn btn-primary">Danh sách bài viết</a>
    </div>
  </form>
  <script type="text/javascript" src="{{ asset('library/ckeditor/ckeditor.js') }}"></script>
  <script>
    CKEDITOR.replace('Content');
  </script>
@endsection
