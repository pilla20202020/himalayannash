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
                                       value="{{ old('title', isset($slider->title) ? $slider->title : '') }}"/>
                               
                                <label for="Name">Title</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" name="caption" class="form-control" value="{{old('caption',isset($slider->caption)?$slider->caption : '')}}"></input>
                                <label for="caption">Caption</label>
                            </div>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="category">Album</label>

                                <select name="album_id" id="album_dropdown" class="form-control">
                                    <option value="" selected>Choose Album</option>
                                    @foreach ($albums as $album)
                                        <option value="{{$album->id}}" @if(isset($slider)) @if($slider->album_id == $album->id) selected @endif @endif>{{$album->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label class="text-default-light">Featured Image(Optional)</label>
                            @if(isset($slider) && $slider->image)
                                <input type="file" name="image" class="dropify" id="input-file-events"
                                       data-default-file="{{ asset($slider->thumbnail_path)}}"/>

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
                                <a class="btn btn-default btn-ink" href="{{ route('slider.index') }}">
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
                                           {{ old('is_published', isset($slider->is_published) ? $slider->is_published : '')=='1' ? 'checked':'' }} data-switchery/>
                                </div>
                            </div>                           
                        </div>
                        <div class="card-head">
                            <div class="side-label">
                                <div class="label-head">
                                    <span>Featured</span>
                                </div>
                                <div class="label-body">
                                    <input type="checkbox" id="switch_demo_1" name="is_featured"
                                           {{ old('is_featured', isset($slider->is_featured) ? $slider->is_featured : '')=='1' ? 'checked':'' }} data-switchery/>
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
