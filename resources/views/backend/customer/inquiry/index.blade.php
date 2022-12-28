@extends('backend.layouts.admin.admin')

@section('title', 'Package Inquiry')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all inquiries</header>

                </div>
                <div class="card-body table-responsive">
                    <table id="example" class="table table-hover display">
                        <thead>
                        <tr>
                            <th width="5%">S.N</th>
                            <th width="10%">Name</th>
                            <th width="10%">Email</th>
                            <th width="10%">Contact No.</th>
                            <th width="10%">For Tour</th>
                            <th width="30%">Message</th>
                            <th width="10%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($inquiries as $key => $inquiry)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$inquiry->first_name}} {{$inquiry->last_name}}</td>
                                <td>{{$inquiry->email}}</td>
                                <td>{{$inquiry->contact_no}}</td>
                                <td>{{$inquiry->package->name}}</td>
                                <td>{!!Str::limit($inquiry->message, 75)!!}</td>
                                <td> <a href="{{route('inquiry.show',$inquiry->id)}}" class="btn btn-flat btn-primary btn-xs" title="show">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                </a>
                                 <a href={{route('inquiry.delete',$inquiry->id)}}" onclick="return confirm('Are you sure?')">
                                    <button type="button" data-url="{{route('inquiry.delete',$inquiry->id)}}"
                                            class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                 </a>
                                 <a href="mailto:{{$inquiry->email}}" class="btn btn-flat btn-primary btn-xs" title="reply"><i class="glyphicon glyphicon-send"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endpush
