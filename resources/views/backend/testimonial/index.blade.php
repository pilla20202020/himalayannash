@extends('backend.layouts.admin.admin')

@section('title', 'Testimonial')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all reviews</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route(substr(Route::currentRouteName(), 0 , strpos(Route::currentRouteName(), '.')) . '.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-hover display">
                            <thead>
                            <tr>
                                <th width="5%">S.N</th>
                                <th width="15%">Customer Image</th>
                                <th width="15%">Customer Name</th>
                                <th width="10%">Customer Rating (5)</th>
                                <th width="30%">Customer Review</th>
                                <th width="20%">Featured</th>
                                <th width="15%" class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @each('backend.testimonial.partials.table', $testimonials, 'testimonial')
                            </tbody>
                        </table>
                    </div>

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
