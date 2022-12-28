<tr>
    <td>{{++$key}}</td>
    <td>{{ Str::limit($album->name, 75) }}</td>
    <td>
        @if($album->is_published =='1')
            <span class="badge" style="background-color: #419645">{{$album->is_published ? 'Yes' : 'No'}}</span>
        @elseif($album->is_published =='0')
            <span class="badge" style="background-color: #f44336">{{$album->is_published ? 'Yes' : 'No'}}</span>
        @endif
    </td>
    <td class="text-right">
        <a href="{{route('albums.edit', $album->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
         <a href="{{ route('albums.destroy', $album->id) }}"  onclick="return confirm('Are you sure?')">
            <button type="button" data-url="{{ route('albums.destroy', $album->slug) }}"
                    class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
    </td>
</tr>
