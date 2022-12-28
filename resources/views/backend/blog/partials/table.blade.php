<tr>
    <td>{{++$key}}</td>
    <td>{{ Str::limit($blog->title, 75) }}</td>
    <td>{{$blog->created_at->format('d M,Y')}}</td>
    <td>
        @if($blog->is_published =='1')
            <span class="badge" style="background-color: #419645">{{$blog->is_published ? 'Yes' : 'No'}}</span>
        @elseif($blog->is_published =='0')
            <span class="badge" style="background-color: #f44336">{{$blog->is_published ? 'Yes' : 'No'}}</span>
        @endif
    </td>
    <td>
        @if($blog->is_featured =='1')
            <span class="badge" style="background-color: #419645">{{$blog->is_featured ? 'Yes' : 'No'}}</span>
        @elseif($blog->is_featured =='0')
            <span class="badge" style="background-color: #f44336">{{$blog->is_featured ? 'Yes' : 'No'}}</span>
        @endif
    </td>
    <td class="text-right">
        <a href="{{route('blog.edit', $blog->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
         <a href="{{ route('blog.destroy', $blog->id) }}" onclick="return confirm('Are you sure?')">
            <button type="button" data-url="{{ route('blog.destroy', $blog->slug) }}"
                    class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
    </td>
</tr>
