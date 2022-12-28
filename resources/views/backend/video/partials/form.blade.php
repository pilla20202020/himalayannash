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
                                       value="{{ old('title', isset($video->title) ? $video->title : '') }}"/>
                                <label for="Name">Title</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea type="text" name="caption" class="form-control">{{old('caption',isset($video->caption)?$video->caption : '')}}</textarea>
                                <label for="specialization">Caption</label>
                            </div>
                        </div>
                    </div>
            

                    <div class="row">
                        <div class="col-sm-6">
                            <label class="text-default-light">Video</label>
                            @if(isset($video) && $video->video)
                                <input type="file" name="video" class="dropify" id="input-file-events"
                                       data-default-file="{{ asset($video->video_path)}}"/>

                            @else
                                <input type="file" name="video" class="dropify"/>
                            @endif
                            <input type="hidden" name="removeimage" id="removeimage" value=""/>
                            @error('video')
                                <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="link">Has Link?</label>
                                        <select name="has_link" id="has_link_dropdown" class="form-control">
                                            <option value="No" @if(isset($video)) @if($video->has_link == "No") selected @endif @endif>No</option>
                                            <option value="Yes" @if(isset($video)) @if($video->has_link == "Yes") selected @endif @endif>Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 video_link" @if(empty($video->video_link))style="display: none;" @endif @if(isset($video)) @if($video->has_link == 'No')style="display: none;" @else style="display:block;" @endif @endif>
                                    <div class="form-group">
                                        <label for="url">Video URL</label>
                                        <input type="text" class="form-control" name="video_link" value="{{ old('video_link', isset($video->video_link) ? $video->video_link : '') }}" >
                                    </div>
                                </div>
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
                                <a class="btn btn-default btn-ink" href="{{ route('videos.index') }}">
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
                                           {{ old('is_published', isset($video->is_published) ? $video->is_published : '')=='1' ? 'checked':'' }} data-switchery/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end .panel-group -->
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $('#has_link_dropdown').on('change',function(e){
            e.preventDefault();
            var has_link = $(this).val();
            if(has_link == 'Yes')
            {
                $('.video_link').show();
            } else {
                $('.video_link').hide();
            }
        });
    } );
</script>
@endpush
@section('scripts')
    <script src="{{ asset('resources/assets/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('resources/assets/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endsection
