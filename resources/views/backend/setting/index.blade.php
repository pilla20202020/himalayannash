@extends('backend.layouts.admin.admin')

@section('title', 'Setting')

@section('content')
    <section>
        {{ Form::open(['route'=>'setting.update','class'=>'form form-validate','method'=>'PUT','files'=>true,'novalidate']) }}
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-head">
                        <header>General Settings</header>
                        <div class="tools">
                            <input type="submit" class="btn btn-primary" value="Save All">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-head">
                                    <header>General</header>
                                </div>
                                <div class="card-body tab-content">
                                    <div class="tab-pane active" id="first2">

                                        <div class="form-group">
                                            {{ Form::text('setting[name]', old('setting.name') ?: setting('name'), ['class'=>'form-control']) }}
                                            {{ Form::label('setting[name]', 'Site Title') }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::text('setting[description]', old('setting.description') ?: setting('description'), ['class'=>'form-control']) }}
                                            {{ Form::label('setting[description]', 'Site description') }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::textarea('setting[address]', old('setting.address') ?: setting('address'), ['class'=>'form-control','rows'=>2,]) }}
                                            {{ Form::label('setting[address]', 'Address') }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::textarea('setting[google_map]', old('setting.google_map') ?: setting('google_map'), ['class'=>'form-control','rows'=>2]) }}
                                            {{ Form::label('setting[google_map]', 'Google Map Link') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-head">
                                    <header>Contacts</header>
                                </div>
                                <div class="card-body tab-content">
                                    <div class="tab-pane active" id="first3">
                                        <div class="form-group">
                                            {{ Form::text('setting[phone]', old('setting.phone') ?: setting('phone'), ['class'=>'form-control']) }}
                                            {{ Form::label('setting[phone]', 'Phone') }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::text('setting[phone_alternate]', old('setting.phone_alternate') ?: setting('phone_alternate'), ['class'=>'form-control']) }}
                                            {{ Form::label('setting[phone_alternate]', 'Phone (Alternate)') }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::text('setting[email]', old('setting.email') ?: setting('email'), ['class'=>'form-control']) }}
                                            {{ Form::label('setting[email]', 'email') }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::text('setting[postbox]', old('setting.postbox') ?: setting('postbox'), ['class'=>'form-control']) }}
                                            {{ Form::label('setting[postbox]', 'postbox') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-head">
                                    <header>Social Links</header>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        {{ Form::textarea('setting[facebook]', old('setting.facebook') ?: setting('facebook'), ['class'=>'form-control','rows'=>2]) }}
                                        {{ Form::label('setting[facebook]', 'Facebook') }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::textarea('setting[instagram]', old('setting.instagram') ?: setting('instagram'), ['class'=>'form-control','rows'=>2]) }}
                                        {{ Form::label('setting[instagram]', 'Instagram') }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::textarea('setting[twitter]', old('setting.twitter') ?: setting('twitter'), ['class'=>'form-control','rows'=>2]) }}
                                        {{ Form::label('setting[twitter]', 'Twitter') }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::textarea('setting[youtube]', old('setting.youtube') ?: setting('youtube'), ['class'=>'form-control','rows'=>2]) }}
                                        {{ Form::label('setting[youtube]', 'Youtube') }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::textarea('setting[linkedin]', old('setting.linkedin') ?: setting('linkedin'), ['class'=>'form-control','rows'=>2]) }}
                                        {{ Form::label('setting[linkedin]', 'LinkedIn') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-head">
                                    <header>Counter</header>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        {{ Form::textarea('setting[total_location]', old('setting.total_location') ?: setting('total_location'), ['class'=>'form-control','rows'=>2]) }}
                                        {{ Form::label('setting[total_location]', 'Total Locations') }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::textarea('setting[popular_destination]', old('setting.popular_destination') ?: setting('popular_destination'), ['class'=>'form-control','rows'=>2]) }}
                                        {{ Form::label('setting[popular_destination]', 'Popular Destinations') }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::textarea('setting[top_listing]', old('setting.top_listing') ?: setting('top_listing'), ['class'=>'form-control','rows'=>2]) }}
                                        {{ Form::label('setting[top_listing]', 'Top Listings') }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::textarea('setting[customers]', old('setting.customers') ?: setting('customers'), ['class'=>'form-control','rows'=>2]) }}
                                        {{ Form::label('setting[customers]', 'Total Customers') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-head">
                                    <header>About Us</header>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        {{ Form::textarea('setting[owner_says]', old('setting.owner_says') ?: setting('owner_says'), ['class'=>'form-control','rows'=>2]) }}
                                        {{ Form::label('setting[owner_says]', 'Owner Says') }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::file('setting[main_image]', old('setting.main_image') ?: setting('main_image'), ['class'=>'form-control','rows'=>2]) }}
                                        {{ Form::label('setting[main_image]', 'Main Image') }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::file('setting[slider1_image]', old('setting.slider1_image') ?: setting('slider1_image'), ['class'=>'form-control','rows'=>2]) }}
                                        {{ Form::label('setting[slider1_image]', 'Slider1 Image') }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::file('setting[slider2_image]', old('setting.slider2_image') ?: setting('slider2_image'), ['class'=>'form-control','rows'=>2]) }}
                                        {{ Form::label('setting[slider1_image]', 'Slider2 Image') }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::file('setting[slider3_image]', old('setting.slider3_image') ?: setting('slider3_image'), ['class'=>'form-control','rows'=>2]) }}
                                        {{ Form::label('setting[slider1_image]', 'Slider3 Image') }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::file('setting[slider4_image]', old('setting.slider4_image') ?: setting('slider4_image'), ['class'=>'form-control','rows'=>2]) }}
                                        {{ Form::label('setting[slider1_image]', 'Slider4 Image') }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::file('setting[slider5_image]', old('setting.slider5_image') ?: setting('slider5_image'), ['class'=>'form-control','rows'=>2]) }}
                                        {{ Form::label('setting[slider1_image]', 'Slider5 Image') }}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        {{ Form::close() }}
    </section>
@stop

@push('styles')
    <link href="{{ asset('css/libs/dropify/dropify.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/libs/dropify/dropify.min.js') }}"></script>
@endpush
