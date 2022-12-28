@extends('backend.layouts.admin.admin')

@section('title', 'Package Inquiry')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all plans</header>

                </div>
                <div class="card-body table-responsive">
                    <table id="example" class="table table-hover display">
                        <thead>
                        <tr>
                            <th width="5%">S.N</th>
                            <th width="10%">Email</th>
                            <th width="10%">Contact No.</th>
                            <th width="10%">Budget Range</th>
                            <th width="10%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($all_plans as $key => $plan)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$plan->email}}</td>
                                <td>{{$plan->contact_no}}</td>
                                <td>{{$plan->min_budget}} - {{$plan->max_budget}}</td>
                                <td> <a href="{{route('customer-trip-plan.show',$plan->id)}}" class="btn btn-flat btn-primary btn-xs" title="show">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                </a>
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
