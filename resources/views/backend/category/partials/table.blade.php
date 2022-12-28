<tr>
    <td>{{++$key}}</td>
    <td>{{$category->name }}</td>
    <td>
        @if($category->is_published =='1')
            <span class="badge" style="background-color: #419645">{{$category->is_published ? 'Yes' : 'No'}}</span>
        @elseif($category->is_published =='0')
            <span class="badge" style="background-color: #f44336">{{$category->is_published ? 'Yes' : 'No'}}</span>
        @endif
    </td>
    <td class="text-right">
        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
         <a href="{{ route('categories.destroy', $category->id) }}" onclick="return confirm('Are you sure?')">
            <button type="button" data-url="{{ route('categories.destroy', $category->id) }}"
                    class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
    </td>
</tr>
