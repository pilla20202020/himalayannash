@extends('backend.layouts.admin.admin')

@section('title', 'Slider')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all sliders</header>
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
                            <th width="10%">Album</th>
                            <th width="10%">Image</th>
                            <th width="10%">Published</th>
                            <th width="10%">Featured</th>
                            <th width="10%" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('backend.slider.partials.table', $sliders, 'slider')
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
