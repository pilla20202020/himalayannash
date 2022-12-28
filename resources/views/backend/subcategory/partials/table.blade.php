<tr>
    <td>{{++$key}}</td>
    <td>{{$subcategory->name }}</td>
    <td>{{$subcategory->category->name }}</td>
    <td>
        @if($subcategory->is_published =='1')
            <span class="badge" style="background-color: #419645">{{$subcategory->is_published ? 'Yes' : 'No'}}</span>
        @elseif($subcategory->is_published =='0')
            <span class="badge" style="background-color: #f44336">{{$subcategory->is_published ? 'Yes' : 'No'}}</span>
        @endif
    </td>
    <td class="text-right">
        <a href="{{route('subcategories.edit', $subcategory->id)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
         <a href="{{ route('subcategories.destroy', $subcategory->id) }}" onclick="return confirm('Are you sure?')">
            <button type="button" data-url="{{ route('subcategories.destroy', $subcategory->id) }}"
                    class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
    </td>
</tr>
