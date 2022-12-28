@csrf
<div class="row">
    <div class="col-sm-9">
        <div class="card">
            <div class="card-underline">
                <div class="card-head">
                    <header>{!! $header !!}</header>
                </div>
                <div class="card-body">
                   
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control"
                                       value="{{ old('title', isset($service->title) ? $service->title : '') }}"/>
                               
                                <label for="Name">Title <span class="text text-danger">*</span></label>
                                @error('title') <span class="text text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea type="text" name="meta_description" class="form-control">{{old('meta_description',isset($service->meta_description)?$service->meta_description : '')}}</textarea>
                               
                                <label for="specialization">Short Description</label>
                            </div>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <strong>Description</strong>
                                <textarea name="content" id=""
                                          class="ckeditor">{{old('content',isset($service->content)?$service->content : '')}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label class="text-default-light">Featured Image(Optional)</label>
                            @if(isset($service) && $service->image)
                                <input type="file" name="image" class="dropify" id="input-file-events"
                                       data-default-file="{{ asset($service->thumbnail_path)}}"/>

                            @else
                                <input type="file" name="image" class="dropify"/>
                            @endif
                            <input type="hidden" name="removeimage" id="removeimage" value=""/>
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
                                <a class="btn btn-default btn-ink" href="{{ route('service.index') }}">
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
                                           {{ old('is_published', isset($service->is_published) ? $service->is_published : '')=='1' ? 'checked':'' }} data-switchery/>
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
