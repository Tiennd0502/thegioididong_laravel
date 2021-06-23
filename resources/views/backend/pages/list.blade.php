<div class="table-responsive mt-4">
  <table class="table table-hover">
    <thead class="text-left text-uppercase">
      <tr class="text-center">
        <th><input type="checkbox" name="selectAll"></th>
        <th>Tiêu đề</th>
        <th>Đường dẫn(link)</th>
        <th>Ngày thêm</th>
        <th>Ngày sửa</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item) 
        <tr class="text-center">
          <td><input type="checkbox" name="select[]"></td>
          <td style="max-width:200px">{{ $item->name }}</td>
          <td style="max-width:200px">{{ $item->link }}</td>
          <td>{{ $item->created_at }}</td>
          <td>{{ $item->updated_at }}</td>
          <td>
            <a class="btn btn-outline-primary" href="{{ route('page.edit',$item->id ) }}"><i class="fas fa-pencil-alt"></i> Sửa</a>
            <form action="{{ route($controllerName.'.destroy', $item->id ) }}" method="POST" class="d-inline-block">
              @csrf
              @method('DELETE')
              <button class="btn btn-outline-danger"><i class="fad fa-trash-alt"></i> Xóa</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{ $items->links() }}
<button type="button" class="btn btn-outline-dark" id="js-selectAll">Chọn tất cả</button>
<button type="button" class="btn btn-outline-dark" id="js-deselectAll">Bỏ chọn tất cả</button>
<button type="submit" class="btn btn-outline-dark">Xóa các mục đã chọn</button>
<a href="{{ route($controllerName.'.create') }}" class="btn btn-success" >Thêm trang</a>