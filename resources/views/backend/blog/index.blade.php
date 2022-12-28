@extends('backend.layouts.admin.admin')

@section('title', 'Blog')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all blogs</header>
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
                            <th width="30%">Title</th>
                            <th width="20%">Published Date</th>
                            <th width="20%">Published</th>
                            <th width="20%">Featured</th>
                            <th width="15%" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('backend.blog.partials.table', $blogs, 'blog')
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
