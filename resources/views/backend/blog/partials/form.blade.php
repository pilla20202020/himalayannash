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
                                <input type="text" name="title" class="form-control" required
                                       value="{{ old('title', isset($blog->title) ? $blog->title : '') }}"/>
                               
                                <label for="Name">Title <span class="text text-danger">*</span></label>
                                @error('title') <span class="text text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea type="text" name="meta_description" class="form-control">{{old('meta_description',isset($blog->meta_description)?$blog->meta_description : '')}}</textarea>
                               
                                <label for="specialization">Short Description</label>
                            </div>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <strong>Description <span class="text text-danger">*</span></strong>
                                <textarea name="content" id=""
                                          class="ckeditor">{{old('content',isset($blog->content)?$blog->content : '')}}</textarea>
                              @error('content') <span class="text text-danger">*</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label class="text-default-light">Featured Image(Optional)</label>
                            @if(isset($blog) && $blog->image)
                                <input type="file" name="image" class="dropify" id="input-file-events"
                                       data-default-file="{{ asset($blog->thumbnail_path)}}"/>

                            @else
                                <input type="file" name="image" class="dropify"/>
                            @endif
                            <input type="hidden" name="removeimage" id="removeimage" value=""/>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <select name="has_link" id="has_link_dropdown" class="form-control">
                                            <option value="No" @if(isset($blog)) @if($blog->has_link == 'No') selected @endif @endif>No</option>
                                            <option value="Yes" @if(isset($blog)) @if($blog->has_link == 'Yes') selected @endif @endif>Yes</option>
                                        </select>
                                        <label for="specialization">Has Video Link?</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 link " @if(empty($blog->link))style="display: none;" @endif @if(isset($blog)) @if($blog->has_link == 'No')style="display: none;" @else style="display:block;" @endif @endif>
                                    <label for="link">Link</label>
                                    <input type="text" class="form-control" name="link" value="{{ old('link', isset($blog->link) ? $blog->link : '') }}" >
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
                                <a class="btn btn-default btn-ink" href="{{ route('blog.index') }}">
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
                                           {{ old('is_published', isset($blog->is_published) ? $blog->is_published : '')=='1' ? 'checked':'' }} data-switchery/>
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
                                           {{ old('is_featured', isset($blog->is_featured) ? $blog->is_featured : '')=='1' ? 'checked':'' }} data-switchery/>
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
<link href="{{ asset('backend/assets/css/libs/dropify/dropify.min.css') }}" rel="stylesheet">
<script>
    $(document).ready(function() {
        $('#has_link_dropdown').on('change',function(e){
            e.preventDefault();
            var has_link = $(this).val();
            if(has_link == 'Yes')
            {
                $('.link').show();
            } else {
                $('.link').hide();
            }
        });
    } );
</script>
@endpush
@section('scripts')
    <script src="{{ asset('resources/assets/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('resources/assets/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endsection
