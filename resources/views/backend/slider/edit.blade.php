@extends('backend.layouts.admin.admin')

@section('title', 'Slider')

@section('content')
    <section>
    <div class="section-body">
            {{ Form::model($slider, ['route' =>['slider.update', $slider->id],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('backend.slider.partials.form', ['header' => 'Edit slider <span class="text-primary">('.Str::limit($slider->title, 47).')</span>'])
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
