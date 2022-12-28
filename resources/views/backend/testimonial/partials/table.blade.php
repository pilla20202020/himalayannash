<tr>
    <td>{{++$key}}</td>
    <td><img src="{{asset($testimonial->image_path)}}" class="img-circle" alt="" height="50" width="50"></td>
    <td>{{ Str::limit($testimonial->name, 75) }}</td>
    <td>{{$testimonial->customer_rating}}</td>
    <td>{{ Str::limit($testimonial->review, 100) }}</td>
    <td>
        @if($testimonial->is_featured =='1')
            <span class="badge" style="background-color: #419645">{{$testimonial->is_featured ? 'Yes' : 'No'}}</span>
        @elseif($testimonial->is_featured =='0')
            <span class="badge" style="background-color: #f44336">{{$testimonial->is_featured ? 'Yes' : 'No'}}</span>
        @endif
    </td>
    <td class="text-right">
        <a href="{{route('testimonials.edit', $testimonial->id)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
         <a href="{{ route('testimonials.destroy', $testimonial->id) }}" onclick="return confirm('Are you sure?')">
            <button type="button" data-url="{{ route('testimonials.destroy', $testimonial->id) }}"
                    class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
    </td>
</tr>
