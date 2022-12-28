@extends('backend.layouts.admin.admin')

@section('title', 'All Customers')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all registered customers</header>

                </div>
                <div class="card-body table-responsive">
                    <table id="example" class="table table-hover display">
                        <thead>
                        <tr>
                            <th width="5%">S.N</th>
                            <th width="10%">Name</th>
                            <th width="10%">Email</th>
                            <th width="10%">Contact No.</th>
                            <th width="10%">Address</th>
                            <th width="10%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($customers as $key => $customer)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->contact_no}}</td>
                                <td>{{$customer->address}}</td>
                                <td><a href="{{route('customer.show',$customer->id)}}" class="btn btn-flat btn-primary btn-sm" title="show"><i class="glyphicon glyphicon-eye-open"></i></a></td>
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
