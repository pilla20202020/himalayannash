@csrf
<div class="row">
    <div class="col-sm-9">
        <div class="card">
            <div class="card-underline">
                <div class="card-head">
                </div>
                <div class="card-body">
                   
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control"
                                       value="{{ old('name', isset($testimonial->name) ? $testimonial->name : '') }}"/>
                               
                                <label for="Name">Customer Name <span class="text text-danger">*</span></label>
                                @error('name') <span class="text text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea type="text" name="review" class="form-control">{{old('review',isset($testimonial->review)?$testimonial->review : '')}}</textarea>
                               
                                <label for="specialization">Customer Review</label>
                            </div>
                        </div>
                    </div>
            

                    <div class="row">
                        <div class="col-sm-6">
                            <label class="text-default-light">Featured Image(Optional)</label>
                            @if(isset($testimonial) && $testimonial->image)
                                <input type="file" name="image" class="dropify" id="input-file-events"
                                       data-default-file="{{ asset($testimonial->thumbnail_path)}}"/>

                            @else
                                <input type="file" name="image" class="dropify"/>
                            @endif
                            <input type="hidden" name="removeimage" id="removeimage" value=""/>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="number" name="customer_rating" class="form-control"
                                       value="{{ old('customer_rating', isset($testimonial->customer_rating) ? $testimonial->customer_rating : '') }}" min="0" max="5"/>
                               
                                <label for="rating">Customer Rating</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="" data-spy="affix" data-offset-top="50">
            <div class="panel-group" id="accordion1">
                <div class="card panel expanded">
                    <div class="card-head" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-1">
                        <header>Publish</header>
                        <div class="tools">
                            <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                        </div>
                    </div>
                    <div id="accordion1-1" class="collapse in">
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <a class="btn btn-default btn-ink" href="{{ route('testimonials.index') }}">
                                    <i class="md md-arrow-back"></i>
                                    Back
                                </a>
                                <input type="submit" name="pageSubmit" class="btn btn-info ink-reaction" value="Save">
                            </div>
                        </div>
                        <div class="card-head">
                            <div class="side-label">
                                <div class="label-head">
                                    <span>Published</span>
                                </div>
                                <div class="label-body">
                                    <input type="checkbox" id="switch_demo_1" name="is_published"
                                           {{ old('is_published', isset($testimonial->is_published) ? $testimonial->is_published : '')=='1' ? 'checked':'' }} data-switchery/>
                                </div>
                            </div>
                            <div class="side-label">
                                <div class="label-head">
                                    <span>Featured</span>
                                </div>
                                <div class="label-body">
                                    <input type="checkbox" id="switch_demo_1" name="is_featured"
                                           {{ old('is_featured', isset($testimonial->is_featured) ? $testimonial->is_featured : '')=='1' ? 'checked':'' }} data-switchery/>
                                </div>
                            </div>                          
                        </div>
                    </div>
                </div>
            </div><!--end .panel-group -->
        </div>
    </div>
</div>

@section('scripts')
    <script src="{{ asset('resources/assets/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('resources/assets/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endsection
