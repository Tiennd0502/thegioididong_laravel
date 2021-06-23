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
					<li class="breadcrumb-item active">
						<span>Thêm sản phẩm</span>
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

  <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row" id="form-row">
      <div class="form-group col-lg-4 col-md-6">
        <label for="privilege">Loại quyền</label>
        <select id="privilege" name="privilege_id" class="form-control" >
          @foreach ($privileges as $privilege)
             <option value="{{ $privilege->id }}">{{ $privilege->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="brands">Thương hiệu</label>
        <select id="brandId" name="brand_id" class="form-control ">
          @foreach ($brands as $brand)
             <option value="{{ $brand->id }}">{{ $brand->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="Name">Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="Name" placeholder="Tên sản phẩm">
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
            <li class="img-box d-none">
              <input type="file" id="image-avatar" value="" name="image" class="form-control js-image-item d-none">
              <span class="icon-close" ><i class="fas fa-times-circle"></i></span>
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
            <li class="" id="insert-attach-carousel">
              <label class="insert-attach js-insert-attach" data-name='carousel'><i class="fas fa-plus"></i></label>
            </li>
          </ul>
        </div>
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="Price">Đơn giá</label>
        <input type="text" name="price" class="form-control" id="Price" placeholder="Đơn giá" value="{{ old('price') }}">
        @error('price')
					<span class="invalid-feedback mt-1" role="alert" style="display:block">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="Discount">Giảm giá( %)</label>
        <input type="text" name="discount" class="form-control" id="Discount" placeholder="Giảm giá" value="{{ old('discount') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="Gift">Quà tặng kèm</label>
        <input type="text" name="gift" class="form-control" id="Gift" placeholder="Quà tặng kèm" value="{{ old('gift') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="Hot">Sản phẩm nổi bật</label>
        <select id="Hot" class="form-control" name="hot">
          <option value="0">Nỗi bật</option>
          <option value="1">Không nỗi bật</option>
        </select>
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="Active">Trạng thái</label>
        <select id="Active" class="form-control" name="active">
          <option value="0">Hiển thị</option>
          <option value="1">Không hiển thị</option>
        </select>
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="Screen">Màn hình</label>
        <input type="text" name="screen" class="form-control" id="Screen" placeholder="Màn hình" value="{{ old('screen') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="HDH">Hệ điều hành</label>
        <input type="text" name="operating_system" class="form-control" id="HDH" placeholder="Hệ điều hành" value="{{ old('operating_system') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="RearCamera">Camera sau</label>
        <input type="text" name="rear_camera" class="form-control" id="RearCamera" placeholder="Camera sau" value="{{ old('rear_camera') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="FrontCamera">Camera trước</label>
        <input type="text" name="front_camera" class="form-control" id="FrontCamera" placeholder="Camera trước" value="{{ old('front_camera') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="CPU">CPU</label>
        <input type="text" name="cpu" class="form-control" id="CPU" placeholder="CPU" value="{{ old('cpu') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="RAM">RAM</label>
        <input type="text" name="ram" class="form-control" id="RAM" placeholder="RAM" value="{{ old('ram') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="InternalMemory">Bộ nhớ trong</label>
        <input type="text" name="internal_memory" class="form-control" id="InternalMemory" placeholder="Bộ nhớ trong" value="{{ old('internal_memory') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="MemoryStick">Thẻ nhớ</label>
        <input type="text" name="memory_stick" class="form-control" id="MemoryStick" placeholder="Hỗ trợ thẻ nhớ" value="{{ old('memory_stick') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6  ">
        <label for="SIM">SIM</label>
        <input type="text" name="sim" class="form-control" id="SIM" placeholder="Sim" value="{{ old('sim') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6">
        <label for="Battery">Dung lượng pin</label>
        <input type="text" name="battery_capacity" class="form-control" id="Battery" placeholder="Dung lượng pin" value="{{ old('battery_capacity') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="PortConnect">Cổng kết nối</label>
        <input type="text" name="port_connect" class="form-control" id="PortConnect" placeholder="Cổng kết nối" value="{{ old('port_connect') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="Conversation">Đàm thoại</label>
        <input type="text" name="conversation" class="form-control" id="Conversation" placeholder="Đàm thoại" value="{{ old('conversation ') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="GraphicCard">Card Màn hình</label>
        <input type="text" name="graphic_card" class="form-control" id="GraphicCard" placeholder="Card Màn hình" value="{{ old('graphic_card ') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="Design">Thiết kế</label>
        <input type="text" name="design" class="form-control" id="Design" placeholder="Thiết kế" value="{{ old('design') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="Size">Kích thước ()</label>
        <input type="text" name="size" class="form-control" id="Size" placeholder="Kích thước" value="{{ old('size') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="LaunchTime">Thời điểm ra mắt</label>
        <input type="text" name="launch_time" class="form-control" id="LaunchTime" placeholder="Thời điểm ra mắt" value="{{ old('launch_time') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="OpticalDrive">Ổ đĩa quang</label>
        <input type="text" name="optical_drive" class="form-control" id="OpticalDrive" placeholder="Ổ đĩa quang" value="{{ old('optical_drive') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="MachineType">Loại máy</label>
        <input type="text" name="machine_type" class="form-control" id="MachineType" placeholder="Loại máy" value="{{ old('machine_type') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="Function">Chức năng</label>
        <select id="Function" class="form-control" name="function" value="{{ old('function') }}">
          <option value="0" selected="">In 2 mặt</option>
          <option value="1">In 1 mặt</option>
        </select>
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="Wattage">Công suất khuyến nghị</label>
        <input type="text" name="wattage" class="form-control" id="Wattage" placeholder="Công suất khuyến nghị" value="{{ old('wattage') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="PrintSpeed">Tốc độ in</label>
        <input type="text" name="print_speed" class="form-control" id="PrintSpeed" placeholder="Tốc độ in" value="{{ old('print_speed') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="PrintingLife">Tuổi thọ in</label>
        <input type="text" name="printing_life" class="form-control" id="PrintingLife" placeholder="Tuổi thọ in" value="{{ old('printing_life') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="PrintQuality">Chất lượng in</label>
        <input type="text" name="print_quality" class="form-control" id="PrintQuality" placeholder="Chất lượng in" value="{{ old('print_quality') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="InkTypes">Loại mực in</label>
        <input type="text" name="ink_types" class="form-control" id="InkTypes" placeholder="Loại mực in" value="{{ old('ink_types') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="FirstPage">Thời gian in trang đầu</label>
        <input type="text" name="first_page_time" class="form-control" id="FirstPage" placeholder="Thời gian in trang đầu" value="{{ old('first_page_time') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="WhereProduction">Nơi sản xuất</label>
        <input type="text" name="where_product" class="form-control" id="WhereProduction" placeholder="Nơi sản xuất" value="{{ old('where_product') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="PrinterCompatibility">Máy in tương thích</label>
        <input type="text" name="printer_compatibility" class="form-control" id="PrinterCompatibility" placeholder="Máy in tương thích" value="{{ old('printer_compatibility') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="MaxPrinterPage">Số trang in tối đa(phủ 5%)</label>
        <input type="text" name="max_printer_page" class="form-control" id="MaxPrinterPage" placeholder="1000" value="{{ old('max_printer_page') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="FaceDiameter">Đường kính mặt</label>
        <input type="text" name="face_diameter" class="form-control" id="FaceDiameter" placeholder="39 mm" value="{{ old('face_diameter') }}">
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="FaceMaterial">Chất liệu mặt</label>
        <input type="text" name="face_material" class="form-control" id="FaceMaterial" placeholder="Kính khoáng (Mineral)" value="{{ old('face_material') }}" >
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="FrameMaterial">Chất liệu khung viền</label>
        <input type="text" name="frame_material" class="form-control" id="FrameMaterial" placeholder="Thép không gỉ" value="{{ old('frame_material') }}" >
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="WireMaterial">Chất liệu dây</label>
        <input type="text" name="wire_material" class="form-control" id="WireMaterial" placeholder="Chất liệu dây" value="{{ old('wire_material') }}" >
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="WireWidth">Độ rộng dây (mm)</label>
        <input type="text" name="wire_width" class="form-control" id="WireWidth" placeholder="Độ rộng dây" value="{{ old('wire_width') }}" >
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="Utilities">Tiện ích</label>
        <input type="text" name="utilities" class="form-control" id="Utilities" placeholder="Tiện ích" value="{{ old('utilities') }}" >
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="Waterproof">Chống nước</label>
        <input type="text" name="waterproof" class="form-control" id="Waterproof" placeholder="Chống nước" value="{{ old('waterproof') }}" >
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="BatteryLifeTime">Thời gian Pin</label>
        <input type="text" name="battery_life_time" class="form-control" id="BatteryLifeTime" placeholder="Thời gian Pin" value="{{ old('battery_life_time') }}" >
      </div>
      <div class="form-group col-lg-4 col-md-6 d-none">
        <label for="ObjectUser">Đối tượng sử dụng (Nam/Nữ)</label>
        <input type="text" name="object_use" class="form-control" id="ObjectUser" placeholder="Nam/Nữ" value="{{ old('object_use') }}" >
      </div>
      <div class="form-group col-md-12">
        <label for="Description">Bài viết về sản phẩm</label>
        <textarea name="desc" id="Description">
          {{ old('desc') }}
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