<div class="table-responsive mt-4">
  <table class="table table-hover">
    <thead class="text-left text-uppercase">
      <tr class="text-center">
        <th><input type="checkbox" name="checkAll"></th>
        <th class="text-center">Icon</th>
        <th>Tên danh mục</th>
        <th class='cate-title'>Meta title</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item)
        <tr class="text-center">
          <td><input type="checkbox" name="check[]"></td>
          <td class="text-center" style="font-size: 30px">{!! $item->icon !!}</td>
          <td>{{ $item->name }}</td>
          <td class='cate-title'>{{ $item->title_seo }}</td>
          <td><a href="{{route($controllerName.'.status',['active', $item->id] )}}" class='text-decoration-none text-white {{$item->getStatus($item->active)['class']}}'>{{ $item->getStatus($item->active)['name'] }}</a></td>
          <td>
            <a class="btn btn-outline-primary" href="{{ route($controllerName.'.edit',$item->id)}}"><i class="fas fa-pencil-alt"></i> Sửa</a>
            <form action="{{$controllerName}}/{{$item->id }}{{ isset($_GET['page']) ? '?page='.$_GET['page'] : ''}}" method="POST" class="d-inline-block">
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