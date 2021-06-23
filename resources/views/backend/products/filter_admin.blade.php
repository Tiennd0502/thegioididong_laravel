@foreach ($items as $item) 
  <tr>
    <td><input type="checkbox" name="select[]"></td>
    <td><img src="{{ asset('images/products'.$item->image) }}" alt="IMG"></td>
    <td style="max-width: 400px;">{{ $item->name }}</td>
    <td>{{ $item->price }}</td>
    <td class="text-center">{{ $item->view }}</td>
    <td><a class="btn btn-outline-success" href="{{ 'product.show',$item->id ) }}">Xem chi tiết</a></td>
    <td>
      <a class="btn btn-outline-success" href="{{ 'product.copy',$item->id ) }}">Copy</a>
      <a class="btn btn-outline-primary" href="{{ 'product.edit',$item->id ) }}">Sửa</a>
      <form action="product/{{$item->id }}" method="POST" class="d-inline-block">
        @csrf
        @method('DELETE')
        <button class="btn btn-outline-danger">Xóa</button>
      </form>
    </td>
  </tr>
@endforeach