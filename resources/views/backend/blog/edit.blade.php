@extends('backend.layouts.admin.admin')

@section('title', 'Blog')

@section('content')
    <section>
    <div class="section-body">
            {{ Form::model($blog, ['route' =>['blog.update', $blog->slug],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('backend.blog.partials.form', ['header' => 'Edit blog <span class="text-primary">('.Str::limit($blog->title, 47).')</span>'])
            {{ Form::close() }}
        </div>
    </section>
@stop

@push('styles')
    <link href="{{ asset('backend/css/libs/dropify/dropify.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('backend/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/dropify/dropify.min.js') }}"></script>
@endpush
