<tr>
    <td>{{++$key}}</td>
    <td>{{ Str::limit($service->title, 75) }}</td>
    <td>
        @if($service->is_published =='1')
            <span class="badge" style="background-color: #419645">{{$service->is_published ? 'Yes' : 'No'}}</span>
        @elseif($service->is_published =='0')
            <span class="badge" style="background-color: #f44336">{{$service->is_published ? 'Yes' : 'No'}}</span>
        @endif
    </td>
    <td class="text-right">
        <a href="{{route('service.edit', $service->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
         <a href="{{ route('service.destroy', $service->id) }}"  onclick="return confirm('Are you sure?')">
            <button type="button" data-url="{{ route('service.destroy', $service->slug) }}"
                    class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
    </td>
</tr>
