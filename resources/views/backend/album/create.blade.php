@extends('backend.layouts.admin.admin')

@section('title', 'Album')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>substr(Route::currentRouteName(), 0 , strpos(Route::currentRouteName(), '.')).'.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('backend.album.partials.form', ['header' => 'Create a new Album'])
            {{ Form::close() }}
        </div>
    </section>
@stop


@push('styles')
    <link href="{{ asset('backend/assets/css/libs/dropify/dropify.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('backend/assets/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/libs/dropify/dropify.min.js') }}"></script>

@endpush
