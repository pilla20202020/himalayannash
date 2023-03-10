@extends('backend.layouts.admin.admin')

@section('title', 'Service')

@section('content')
    <section>
    <div class="section-body">
            {{ Form::model($service, ['route' =>['service.update', $service->slug],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('backend.service.partials.form', ['header' => 'Edit service <span class="text-primary">('.Str::limit($service->title, 47).')</span>'])
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
