<tr>
    <td>{{++$key}}</td>
    <td>{{$package->category->name}}</td>
    <td>@if($package->sub_category_id){{$package->subCategory->name}} @else - @endif</td>
    <td>{{ Str::limit($package->name, 75) }}</td>
    <td>{{$package->location}}</td>
    <td>{{$package->price}}</td>
    <td>
        @if($package->is_published =='1')
            <span class="badge" style="background-color: #419645">{{$package->is_published ? 'Yes' : 'No'}}</span>
        @elseif($package->is_published =='0')
            <span class="badge" style="background-color: #f44336">{{$package->is_published ? 'Yes' : 'No'}}</span>
        @endif
    </td>
    <td>
        @if($package->is_featured =='1')
            <span class="badge" style="background-color: #419645">{{$package->is_featured ? 'Yes' : 'No'}}</span>
        @elseif($package->is_featured =='0')
            <span class="badge" style="background-color: #f44336">{{$package->is_featured ? 'Yes' : 'No'}}</span>
        @endif
    </td>
    <td>
        @if($package->is_trending =='1')
            <span class="badge" style="background-color: #419645">{{$package->is_trending ? 'Yes' : 'No'}}</span>
        @elseif($package->is_trending =='0')
            <span class="badge" style="background-color: #f44336">{{$package->is_trending ? 'Yes' : 'No'}}</span>
        @endif
    </td>
    <td class="text-right">
        <a href="{{route('package.edit', $package->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
         <a href="{{ route('package.destroy', $package->id) }}" onclick="return confirm('Are you sure?')">
            <button type="button" data-url="{{ route('package.destroy', $package->slug) }}"
                    class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
    </td>
</tr>
