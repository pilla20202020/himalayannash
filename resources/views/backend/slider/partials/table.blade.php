<tr>
    <td>{{++$key}}</td>
    <td>@if($slider->album_id){{$slider->album->name}}@else - @endif</td>
    <td><img src="{{asset($slider->image_path)}}" alt="" height="50" width="50"></td>
    <td>
        @if($slider->is_published =='1')
            <span class="badge" style="background-color: #419645">{{$slider->is_published ? 'Yes' : 'No'}}</span>
        @elseif($slider->is_published =='0')
            <span class="badge" style="background-color: #f44336">{{$slider->is_published ? 'Yes' : 'No'}}</span>
        @endif
    </td>
    <td>
        @if($slider->is_featured =='1')
            <span class="badge" style="background-color: #419645">{{$slider->is_featured ? 'Yes' : 'No'}}</span>
        @elseif($slider->is_featured =='0')
            <span class="badge" style="background-color: #f44336">{{$slider->is_featured ? 'Yes' : 'No'}}</span>
        @endif
    </td>
    <td class="text-right">
        <a href="{{route('slider.edit', $slider->id)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
         <a href="{{ route('slider.destroy', $slider->id) }}"  onclick="return confirm('Are you sure?')">
            <button type="button" data-url="{{ route('slider.destroy', $slider->id) }}"
                    class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
    </td>
</tr>
