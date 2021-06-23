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
						<a href="{{ route('product.index') }}" class="text-decoration-none "><i class="fas fa-tachometer-alt mr-1"></i>
							Sản phẩm
						</a>
					</li>
					<li class="breadcrumb-item active">
						<span>Sửa sản phẩm</span>
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

  <form action="{{ route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row " id="form-row">
      <div class="form-group col-lg-4 col-md-6">
        <label for="category">Loại hàng</label>
        <select id="categoryId" name="category_id" class="form-control" >
          @foreach ($categories as $category)
             <option value="{{ $category->id }}" {{ (old('category_id') == $category->id || $category_id == $category->id) ? 'selected' :'' }}>{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="brands">Thương hiệu</label>
        <select id="brandId" name="brand_id" class="form-control " data-brand='{{!empty(old('brand_id')) ? old('brand_id') : $product->brand_id}}'>
          @foreach ($brands as $brand)
             <option value="{{ $brand->id }}" {{ (old('brand_id') == $brand->id || $product->brand_id == $brand->id) ? 'selected' :'' }}>{{ $brand->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="Name">Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" value="{{ !empty(old('name')) ? old('name') : $product->name }}" id="Name" placeholder="Tên sản phẩm">
        @error('name')
					<span class="invalid-feedback mt-1" role="alert" style="display:block">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
      </div>
      <div class="form-group col-lg-4 col-md-6 ">
        <div class="form-upload" id="Avatar" >
          <label class="insert-attach" for="image-avatar"><i class="fas fa-camera-retro mr-2" ></i> Ảnh đại diện( Chỉ chọn 1 ảnh)</label>
        </div>
        <div class="list-attach">
          <ul class="attach-view" >
            <li class="img-box">
              <input type="hidden" name="linkImage" value="">
              <span class="icon-close" data-edit='{{ $product->image }}'><i class="fas fa-times-circle"></i></span> 
              <img src="{{ asset('images/products'.$product->image)}}" alt="">
            </li>
            <li class="img-box d-none">
              <input type="file" id="image-avatar" value="" name="image" class="form-control js-image-item d-none">
              <span class="icon-close"><i class="fas fa-times-circle"></i></span>
              <img src="" class="delete_img">
            </li>
            <li class="" id="insert-attach-image">
              <label class="insert-attach" for="image-avatar"><i class="fas fa-plus"></i></label>
            </li>
          </ul>
        </div>
        @error('image')
					<span class="invalid-feedback mt-1" role="alert" style="display:block">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
      </div>
      <div class="form-group col-lg-4 col-md-6 ">
        <div class="form-upload" id="Icon" >
          <label class="insert-attach" for="image-icon"><i class="fas fa-camera-retro mr-2" ></i> Icon( Chỉ chọn 1 ảnh)</label>
        </div>
        <div class="list-attach">
          <ul class="attach-view">
            @if (!empty($product->icon))
              <li class="img-box">
                <input type="hidden" name="linkIcon" value="">
                <span class="icon-close" data-edit='{{ $product->icon }}'><i class="fas fa-times-circle"></i></span> 
                <img src="{{ asset('images/icons'.$product->icon)}}" alt="">
              </li>
            @endif
            <li class="img-box d-none">
              <input type="file" id="image-icon" value="" name="icon" class="form-control js-image-item d-none">
              <span class="icon-close" ><i class="fas fa-times-circle"></i></span>
              <img src="" class="delete_img">
            </li>
            <li class="" id="insert-attach-image">
              <label class="insert-attach" for="image-icon"><i class="fas fa-plus"></i></label>
            </li>
          </ul>
        </div>
      </div>
      <div class="form-group col-lg-4 col-md-6 ">
        <div class="form-upload" id="Library">
          <label class="insert-attach js-insert-attach" data-name='library'><i class="fas fa-camera-retro mr-2" ></i> Ảnh chi tiết</label>
        </div>
        <div class="list-attach">
          <ul class="attach-view" id="attach-view-library">
            @foreach ($libraries as $library)
              <li class="img-box">
                <input type="hidden" name="linkLibrary[]" value="">
                <span class="icon-close" data-edit="{{ $library->id }}"><i class="fas fa-times-circle"></i></span> 
                <img src="{{ asset('images/products'.$library->name)}}" alt="">
              </li>
            @endforeach
            <li class="" id="insert-attach-library">
              <label class="insert-attach js-insert-attach" data-name='library'><i class="fas fa-plus"></i></label>
            </li>
          </ul>
        </div>
      </div>
      <div class="form-group col-lg-4 col-md-6 ">
        <div class="form-upload" id="Image_hot" >
          <label class="insert-attach" for="image-hot"><i class="fas fa-camera-retro mr-2" ></i> Ảnh nổi bật nhất( Chỉ chọn 1 ảnh)</label>
        </div>
        <div class="list-attach img-carousel">
          <ul class="attach-view" id="attach-view-image_hot">
            @if (!empty($product->image_hot))
              <li class="img-box">
                <input type="hidden" name="linkHot" value="">
                <span class="icon-close" data-edit='{{ $product->image_hot }}'><i class="fas fa-times-circle"></i></span> 
                <img src="{{ asset('images/products'.$product->image_hot)}}" alt="">
              </li>
            @endif
            <li class="img-box d-none">
              <input type="file" id="image-hot" value="" name="image_hot" class="form-control js-image-item d-none">
              <span class="icon-close" ><i class="fas fa-times-circle"></i></span>
              <img src="" class="delete_img">
            </li>
            <li class="" id="insert-attach-image">
              <label class="insert-attach" for="image-hot"><i class="fas fa-plus"></i></label>
            </li>
          </ul>
        </div>
      </div>
      <div class="form-group col-lg-4 col-md-6 ">
        <div class="form-upload" id="Carousel" >
          <label class="insert-attach js-insert-attach" data-name='carousel'><i class="fas fa-camera-retro mr-2" ></i> Ảnh carousel( ảnh slide)</label>
        </div>
        <div class="list-attach img-carousel">
          <ul class="attach-view" id="attach-view-carousel">
            @foreach ($carousels as $carousel)
              <li class="img-box">
                <input type="hidden" name="linkCarousel[]" value="">
                <span class="icon-close" data-edit="{{ $carousel->id }}"><i class="fas fa-times-circle"></i></span> 
                <img src="{{ asset('images/products'.$carousel->name)}}" alt="">
              </li>
            @endforeach
            <li class="" id="insert-attach-carousel">
              <label class="insert-attach js-insert-attach" data-name='carousel'><i class="fas fa-plus"></i></label>
            </li>
          </ul>
        </div>
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="Price">Đơn giá</label>
        <input type="text" name="price" class="form-control" id="Price" placeholder="Đơn giá" value="{{ !empty(old('price')) ? old('price') : $product->price }}">
        @error('price')
					<span class="invalid-feedback mt-1" role="alert" style="display:block">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="Discount">Giảm giá( %)</label>
        <input type="text" name="discount" class="form-control" id="Discount" placeholder="Giảm giá" value="{{ !empty(old('discount')) ? old('discount') : $product->discount }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="Gift">Quà tặng kèm</label>
        <input type="text" name="gift" class="form-control" id="Gift" placeholder="Quà tặng kèm" value="{{ !empty(old('gift')) ? old('gift') : $product->gift }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="Hot">Sản phẩm nổi bật</label>
        <select id="Hot" class="form-control" name="hot">
          <option value="0" {{ ($product->hot == 0) ? 'selected' : '' }}>Nỗi bật</option>
          <option value="1" {{ ($product->hot == 1) ? 'selected' : '' }}>Không nỗi bật</option>
        </select>
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="Active">Trạng thái</label>
        <select id="Active" class="form-control" name="active">
          <option value="0"{{ ($product->active == 0) ? 'selected' : '' }}>Hiển thị</option>
          <option value="1"{{ ($product->active == 1) ? 'selected' : '' }}>Không hiển thị</option>
        </select>
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="Screen">Màn hình</label>
        <input type="text" name="screen" class="form-control" id="Screen" placeholder="Màn hình" value="{{ !empty(old('screen')) ? old('screen') : $productDetail->screen }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="HDH">Hệ điều hành</label>
        <input type="text" name="operating_system" class="form-control" id="HDH" placeholder="Hệ điều hành" value="{{ !empty(old('operating_system')) ? old('operating_system') : $productDetail->operating_system }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="RearCamera">Camera sau</label>
        <input type="text" name="rear_camera" class="form-control" id="RearCamera" placeholder="Camera sau" value="{{ !empty(old('rear_camera')) ? old('rear_camera') : $productDetail->rear_camera }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="FrontCamera">Camera trước</label>
        <input type="text" name="front_camera" class="form-control" id="FrontCamera" placeholder="Camera trước" value="{{ !empty(old('front_camera')) ? old('front_camera') : $productDetail->front_camera }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="CPU">CPU</label>
        <input type="text" name="cpu" class="form-control" id="CPU" placeholder="CPU" value="{{ !empty(old('cpu')) ? old('cpu') : $productDetail->cpu }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="RAM">RAM</label>
        <input type="text" name="ram" class="form-control" id="RAM" placeholder="RAM" value="{{ !empty(old('ram')) ? old('ram') : $productDetail->ram }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="InternalMemory">Bộ nhớ trong</label>
        <input type="text" name="internal_memory" class="form-control" id="InternalMemory" placeholder="Bộ nhớ trong" value="{{ !empty(old('internal_memory')) ? old('internal_memory') : $productDetail->internal_memory }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="MemoryStick">Thẻ nhớ</label>
        <input type="text" name="memory_stick" class="form-control" id="MemoryStick" placeholder="Hỗ trợ thẻ nhớ" value="{{ !empty(old('memory_stick')) ? old('memory_stick') : $productDetail->memory_stick }}">
      </div>
      <div class="form-group col-lg-4 col-md-6  ">
        <label for="SIM">SIM</label>
        <input type="text" name="sim" class="form-control" id="SIM" placeholder="Sim" value="{{ !empty(old('sim')) ? old('sim') : $productDetail->sim }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="Battery">Dung lượng pin</label>
        <input type="text" name="battery_capacity" class="form-control" id="Battery" placeholder="Dung lượng pin" value="{{ !empty(old('battery_capacity')) ? old('battery_capacity') : $productDetail->battery_capacity }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="PortConnect">Cổng kết nối</label>
        <input type="text" name="port_connect" class="form-control" id="PortConnect" placeholder="Cổng kết nối" value="{{ !empty(old('port_connect')) ? old('port_connect') : $productDetail->port_connect }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="Conversation">Đàm thoại</label>
        <input type="text" name="conversation" class="form-control" id="Conversation" placeholder="Đàm thoại" value="{{ !empty(old('conversation')) ? old('conversation') : $productDetail->conversation }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="GraphicCard">Card Màn hình</label>
        <input type="text" name="graphic_card" class="form-control" id="GraphicCard" placeholder="Card Màn hình" value="{{ !empty(old('graphic_card')) ? old('graphic_card') : $productDetail->graphic_card }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="Design">Thiết kế</label>
        <input type="text" name="design" class="form-control" id="Design" placeholder="Thiết kế" value="{{ !empty(old('design')) ? old('design') : $productDetail->design }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="Size">Kích thước ()</label>
        <input type="text" name="size" class="form-control" id="Size" placeholder="Kích thước" value="{{ !empty(old('size')) ? old('size') : $productDetail->size }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="LaunchTime">Thời điểm ra mắt</label>
        <input type="text" name="launch_time" class="form-control" id="LaunchTime" placeholder="Thời điểm ra mắt" value="{{ !empty(old('launch_time')) ? old('launch_time') : $productDetail->launch_time }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="OpticalDrive">Ổ đĩa quang</label>
        <input type="text" name="optical_drive" class="form-control" id="OpticalDrive" placeholder="Ổ đĩa quang" value="{{ !empty(old('optical_drive')) ? old('optical_drive') : $productDetail->optical_drive }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="MachineType">Loại máy</label>
        <input type="text" name="machine_type" class="form-control" id="MachineType" placeholder="Loại máy" value="{{ !empty(old('machine_type')) ? old('machine_type') : $productDetail->machine_type }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="Function">Chức năng</label>
        <select id="Function" class="form-control" name="function" value="{{ old('function') }}">
          <option value="0" {{ ($productDetail->function == 0) ? 'selected' : '' }}>In 2 mặt</option>
          <option value="1" {{ ($productDetail->function == 1) ? 'selected' : '' }}>In 1 mặt</option>
        </select>
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="Wattage">Công suất khuyến nghị</label>
        <input type="text" name="wattage" class="form-control" id="Wattage" placeholder="Công suất khuyến nghị" value="{{ !empty(old('wattage')) ? old('wattage') : $productDetail->wattage }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="PrintSpeed">Tốc độ in</label>
        <input type="text" name="print_speed" class="form-control" id="PrintSpeed" placeholder="Tốc độ in" value="{{ !empty(old('print_speed')) ? old('print_speed') : $productDetail->print_speed }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="PrintingLife">Tuổi thọ in</label>
        <input type="text" name="printing_life" class="form-control" id="PrintingLife" placeholder="Tuổi thọ in" value="{{ !empty(old('printing_life')) ? old('printing_life') : $productDetail->printing_life }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="PrintQuality">Chất lượng in</label>
        <input type="text" name="print_quality" class="form-control" id="PrintQuality" placeholder="Chất lượng in" value="{{ !empty(old('print_quality')) ? old('print_quality') : $productDetail->print_quality }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="InkTypes">Loại mực in</label>
        <input type="text" name="ink_types" class="form-control" id="InkTypes" placeholder="Loại mực in" value="{{ !empty(old('ink_types')) ? old('ink_types') : $productDetail->ink_types }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="FirstPage">Thời gian in trang đầu</label>
        <input type="text" name="first_page_time" class="form-control" id="FirstPage" placeholder="Thời gian in trang đầu" value="{{ !empty(old('first_page_time')) ? old('first_page_time') : $productDetail->first_page_time }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="WhereProduction">Nơi sản xuất</label>
        <input type="text" name="where_product" class="form-control" id="WhereProduction" placeholder="Nơi sản xuất" value="{{ !empty(old('where_product')) ? old('where_product') : $productDetail->where_product }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="PrinterCompatibility">Máy in tương thích</label>
        <input type="text" name="printer_compatibility" class="form-control" id="PrinterCompatibility" placeholder="Máy in tương thích" value="{{ !empty(old('printer_compatibility')) ? old('printer_compatibility') : $productDetail->printer_compatibility }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="MaxPrinterPage">Số trang in tối đa(phủ 5%)</label>
        <input type="text" name="max_printer_page" class="form-control" id="MaxPrinterPage" placeholder="1000" value="{{ !empty(old('max_printer_page')) ? old('max_printer_page') : $productDetail->max_printer_page }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="FaceDiameter">Đường kính mặt</label>
        <input type="text" name="face_diameter" class="form-control" id="FaceDiameter" placeholder="39 mm" value="{{ !empty(old('face_diameter')) ? old('face_diameter') : $productDetail->face_diameter }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="FaceMaterial">Chất liệu mặt</label>
        <input type="text" name="face_material" class="form-control" id="FaceMaterial" placeholder="Kính khoáng (Mineral)" value="{{ !empty(old('face_material')) ? old('face_material') : $productDetail->face_material }}" >
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="FrameMaterial">Chất liệu khung viền</label>
        <input type="text" name="frame_material" class="form-control" id="FrameMaterial" placeholder="Thép không gỉ" value="{{ !empty(old('frame_material')) ? old('frame_material') : $productDetail->frame_material }}" >
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="WireMaterial">Chất liệu dây</label>
        <input type="text" name="wire_material" class="form-control" id="WireMaterial" placeholder="Chất liệu dây" value="{{ !empty(old('wire_material')) ? old('wire_material') : $productDetail->wire_material }}" >
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="WireWidth">Độ rộng dây (mm)</label>
        <input type="text" name="wire_width" class="form-control" id="WireWidth" placeholder="Độ rộng dây" value="{{ !empty(old('wire_width')) ? old('wire_width') : $productDetail->wire_width }}" >
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="Utilities">Tiện ích</label>
        <input type="text" name="utilities" class="form-control" id="Utilities" placeholder="Tiện ích" value="{{ !empty(old('utilities')) ? old('utilities') : $productDetail->utilities }}" >
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="Waterproof">Chống nước</label>
        <input type="text" name="waterproof" class="form-control" id="Waterproof" placeholder="Chống nước" value="{{ !empty(old('waterproof')) ? old('waterproof') : $productDetail->waterproof }}" >
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="BatteryLifeTime">Thời gian Pin</label>
        <input type="text" name="battery_life_time" class="form-control" id="BatteryLifeTime" placeholder="Thời gian Pin" value="{{ !empty(old('battery_life_time')) ? old('battery_life_time') : $productDetail->battery_life_time }}" >
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="ObjectUser">Đối tượng sử dụng (Nam/Nữ)</label>
        <input type="text" name="object_use" class="form-control" id="ObjectUser" placeholder="Nam/Nữ" value="{{ !empty(old('object_use')) ? old('object_use') : $productDetail->object_use }}" >
      </div>
      <div class="form-group col-md-12">
        <label for="Description">Bài viết về sản phẩm</label>
        <textarea name="desc" id="Description">
          {{ !empty(old('desc')) ? old('desc') : $product->desc }}
        </textarea>
        @error('desc')
					<span class="invalid-feedback mt-1" role="alert" style="display:block">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
       </div>
    </div>
    
    <div class="form-group">
      <button type="submit" name="create" class="btn btn-primary" id="submitProduct">Lưu lại</button>
      <button type="reset" class="btn btn-primary">Nhập lại</button>
      <a href="{{ route('product.index') }}" class="btn btn-primary">Danh sách </a>
    </div>
  </form>
  <script type="text/javascript" src="{{ asset('library/ckeditor/ckeditor.js') }}"></script>
  <script>
    CKEDITOR.replace('Description');
  </script>
@endsection