
  <div class="table-responsive mt-4">
    <table class="table table-hover">
      <thead class="text-left text-uppercase">
        <tr class="text-center">
          <th><input type="checkbox" name="selectAll"></th>
          <th>Ảnh</th>
          <th>Tên</th>
          <th>Danh mục</th>
          <th>Thương hiệu</th>
          <th>Trạng thái</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody id="js-list" class="text-center">
         
        @foreach ($items as $item) 
          <tr >
            <td><input type="checkbox" name="select[]"></td>
            <td><img src="{{ asset('images/products'.$item->avatar) }}" alt="IMG"></td>
            <td class='prd-name'>{{ $item->name }}</td>
            <td>{{ $item->category->name }}</td>
            <td>{{ $item->brand->name }}</td>
            <td><a href="{{route($controllerName.'.status',['active', $item->id] )}}" class='text-decoration-none text-white {{$item->getStatus($item->active)['class']}}'>{{ $item->getStatus($item->active)['name'] }}</a></td>
            <td>
              <a class="btn btn-outline-success" href="{{ route($controllerName.'.show',$item->id ) }}"><i class="fad fa-eye"></i> Xem </a>
              <a class="btn btn-outline-success" href="{{ route($controllerName.'.copy',$item->id ) }}"><i class="fad fa-copy"></i> Copy</a>
              <a class="btn btn-outline-primary" href="{{ route($controllerName.'.edit',$item->id ) }}"><i class="fas fa-pencil-alt"></i> Sửa</a>
              <form action="product/{{$item->id }}{{ isset($_GET['page']) ? '?page='.$_GET['page'] : ''}}" method="POST" class="d-inline-block">
                {{-- {{ route('category.destroy', $category->id ) }} --}}
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