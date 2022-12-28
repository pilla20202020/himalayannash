@extends('backend.layouts.admin.admin')

@section('title', 'Package')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all packages</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route(substr(Route::currentRouteName(), 0 , strpos(Route::currentRouteName(), '.')) . '.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="example" class="table table-hover display">
                        <thead>
                        <tr>
                            <th width="5%">S.N</th>
                            <th width="10%">Category</th>
                            <th width="10%">SubCategory</th>
                            <th width="30%">Name</th>
                            <th width="20%">Location</th>
                            <th width="10%">Price</th>
                            <th width="10%">Published</th>
                            <th width="10%">Featured</th>
                            <th width="10%">Trending</th>
                            <th width="10%" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('backend.package.partials.table', $packages, 'package')
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
