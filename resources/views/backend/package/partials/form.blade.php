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
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body ">
                                    <div id="rootwizard1" class="form-wizard form-wizard-horizontal">
                                            <div class="form-wizard-nav form floating-label">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-primary"></div>
                                                </div>
                                                <ul class="nav nav-justified">
                                                    <li class="active"><a href="#tab1" data-toggle="tab"><span
                                                                class="step">1</span> <span
                                                                class="title">BASIC</span></a></li>
                                                    <li><a href="#tab2" data-toggle="tab"><span
                                                                class="step">2</span> <span
                                                                class="title">DETAIL</span></a></li>
                                                    <li><a href="#tab3" data-toggle="tab"><span
                                                                class="step">3</span> <span
                                                                class="title">ITINERARY</span></a></li>
                                                    <li><a href="#tab4" data-toggle="tab"><span
                                                                class="step">4</span> <span
                                                                class="title">PHOTO</span></a>
                                                    </li><li><a href="#tab5" data-toggle="tab"><span
                                                                    class="step">5</span> <span
                                                                    class="title">POLICIES</span></a></li>
                                                </ul>
                                            </div>
                                            <!--end .form-wizard-nav -->
                                            <div class="tab-content clearfix">
                                                <div class="tab-pane active" id="tab1">
                                                    <br /><br />
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <select name="category_id" id="category_dropdown"
                                                                    class="form-control" required>
                                                                    <option value="#" selected disabled>Choose Category
                                                                    </option>
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{$category->id }}" @if(old('category_id') == $category->id) selected @endif @if(isset($package) && $package->category_id == $category->id) selected @endif>
                                                                            {{ $category->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <label for="Category"
                                                                    class="control-label">Category</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                @if(isset($package))
                                                                <select name="sub_category_id"
                                                                    id="sub_category_dropdown" class="form-control">
                                                                    @foreach ($sub_category as $sub)
                                                                    <option value="{{$sub->id}}" @if($package->sub_category_id == $sub->id) selected @endif>{{$sub->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @else
                                                                <select name="sub_category_id"
                                                                id="sub_category_dropdown" class="form-control">

                                                                </select>
                                                                @endif
                                                                <label for="Subcategory" class="control-label">Sub
                                                                    Category</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <select name="difficulty_level" id="difficulty_level"
                                                                    class="form-control">
                                                                    <option value="" selected>Choose Difficulty Level
                                                                        (or Leave Blank)</option>
                                                                    <option value="Beginner" @if(old('difficulty_level') == 'Beginner') selected @endif @if(isset($package) && $package->difficulty_level == 'Beginner') selected @endif>Beginner</option>
                                                                    <option value="Intermediate" @if(old('difficulty_level') == 'Intermediate') selected @endif @if(isset($package) && $package->difficulty_level == 'Intermediate') selected @endif>Intermediate</option>
                                                                    <option value="Advanced" @if(old('difficulty_level') == 'Advanced') selected @endif @if(isset($package) && $package->difficulty_level == 'Advanced') selected @endif>Advanced</option>
                                                                    <option value="Extreme" @if(old('difficulty_level') == 'Extreme') selected @endif @if(isset($package) && $package->difficulty_level == 'Extreme') selected @endif>Extreme</option>
                                                                </select>
                                                                <label for="Level" class="control-label">Difficult
                                                                    Level</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input type="text" name="name" id="name"
                                                                    class="form-control" value="{{ old('name', isset($package->name) ? $package->name : '') }}" required>
                                                                <label for="name" class="control-label">Name</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <input type="text" name="location" id="location"
                                                                    class="form-control" value="{{ old('location', isset($package->location) ? $package->location : '') }}">
                                                                <label for="location"
                                                                    class="control-label">Location</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <input type="number" name="no_of_days" id="no_of_days"
                                                                    class="form-control" min="1"  value="{{ old('no_of_days', isset($package->no_of_days) ? $package->no_of_days : '') }}">
                                                                <label for="days" class="control-label">No. of
                                                                    Days</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <input type="number" name="no_of_nights"
                                                                    id="no_of_nights" class="form-control" min="1" value="{{ old('no_of_nights', isset($package->no_of_nights) ? $package->no_of_nights : '') }}">
                                                                <label for="nights" class="control-label">No. of
                                                                    Nights</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="number" name="price" id="price"
                                                                    class="form-control" value="{{ old('price', isset($package->price) ? $package->price : '') }}">
                                                                <label for="price" class="control-label">Price</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end #tab1 -->
                                                <div class="tab-pane" id="tab2">
                                                    <br /><br />
                                                    <div class="form-group">
                                                        <textarea name="overview" id="overview" class="ckeditor">{{old('overview',isset($package->overview)?$package->overview : '')}}</textarea>
                                                        <label for="overview" class="control-label">Overview</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="summary" id="summary" class="ckeditor">{{old('summary',isset($package->summary)?$package->summary : '')}}</textarea>
                                                        <label for="summary" class="control-label">Summary</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="cost_info" id="cost_info" class="ckeditor">{{old('cost_info',isset($package->cost_info)?$package->cost_info : '')}}</textarea>
                                                        <label for="cost_info" class="control-label">Cost Info</label>
                                                        <em>(About cost included and not included)</em>
                                                    </div>
                                                </div>
                                                <!--end #tab2 -->
                                                <div class="tab-pane" id="tab3">
                                                    <br /><br />
                                                    @if(isset($package) && $itineraries->isNotEmpty())
                                                    <div id="additernary">
                                                        <div class="form-group row d-flex align-items-end">
                                                            @foreach ($itineraries as $iti)
                                                            <div class="form-group col-sm-6">
                                                                <input type="hidden" class="form-control" name="package_id">
                                                                <input type="hidden" class="form-control" name="itinerary_id[{{$iti->id}}]" value="{{$iti->id}}">
                                                                <input type="number" name="day[]" id="day"
                                                                    class="form-control" value="{{ old('day', isset($iti->day) ? $iti->day : '') }}">
                                                                <label for="day" class="control-label mt-2">Day #</label>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <input type="text" name="title[]" id="title"
                                                                    class="form-control" value="{{ old('title', isset($iti->title) ? $iti->title : '') }}">
                                                                <label for="title" class="control-label mt-2">Title</label>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="descriprion" class="control-label p-2">Itinerary</label>
                                                                <textarea name="description[]" id="description" class="ckeditor p-2">{{old('description',isset($iti->description) ? $iti->description : '')}}</textarea>
                                                            </div>                                                                
                                                            @endforeach
                                                            <div class="col-md-1" style="margin-top: 45px;">
                                                                <input id="additemrow" type="button"
                                                                    class="btn btn-sm btn-primary mr-1" value="Add Row">
                                                            </div>

                                                        </div>
                                                        <input type="hidden" id="temp" value="0" name="temp">
                                                    </div>
                                                    @else
                                                    <div id="additernary">
                                                        <div class="form-group row d-flex align-items-end">
                                                            <div class="form-group col-sm-6">
                                                                <input type="hidden" class="form-control" name="package_id">
                                                                <input type="number" name="day[]" id="day"
                                                                    class="form-control">
                                                                <label for="day" class="control-label">Day #</label>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <input type="text" name="title[]" id="title"
                                                                    class="form-control">
                                                                <label for="title" class="control-label">Title</label>
                                                            </div>   
                                                            <div class="col-sm-12">
                                                                <textarea name="description[]" id="description" class="ckeditor p-2"></textarea>
                                                            </div>

                                                            <div class="col-md-1" style="margin-top: 45px;">
                                                                <input id="additemrow" type="button"
                                                                    class="btn btn-sm btn-primary mr-1" value="Add Row">
                                                            </div>

                                                        </div>
                                                        <input type="hidden" id="temp" value="0" name="temp">
                                                    </div>
                                                    @endif
                                                </div>
                                                <!--end #tab3 -->
                                                <div class="tab-pane" id="tab4">
                                                    <br /><br />
                                                    <div id="addimage">
                                                        <div class="form-group row d-flex align-items-end">
                                                            @if(isset($package) && $images->isNotEmpty())
                                                                @foreach ($images as $key => $image)
                                                                <div class="form-group col-sm-10">
                                                                    <input type="file" name="images[]" id="images" class="form-control dropify"  id="input-file-events"
                                                                    data-default-file="{{asset('uploads/package')}}/{{$image->image_name}}">
                                                                    <label for="image" class="control-label">Featured Image</label>
                                                                </div>
                                                                @endforeach
                                                            @else
                                                                <div class="form-group col-sm-10">
                                                                    <input type="file" name="images[]" id="images" class="form-control dropify">
                                                                    <label for="image" class="control-label">Featured Image</label>
                                                                </div>
                                                            @endif
                                                            <div class="col-md-2" style="margin-top: 45px;">
                                                                <input id="addimagerow" type="button"
                                                                    class="btn btn-sm btn-primary mr-1" value="Add Row">
                                                            </div>

                                                        </div>
                                                        <input type="hidden" id="temp" value="0" name="temp">
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab5">
                                                    <br /><br />
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <textarea name="confirmation_policy" id="confirmation_policy" class="ckeditor">{{old('confirmation_policy',isset($package->confirmation_policy)?$package->confirmation_policy : '')}}</textarea>
                                                                <label for="confirmation_policy" class="control-label">Confirmation Policy</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea name="refund_policy" id="refund_policy" class="ckeditor">{{old('refund_policy',isset($package->refund_policy)?$package->refund_policy : '')}}</textarea>
                                                                <label for="refund_policy" class="control-label">Refund Policy</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea name="cancellation_policy" id="cancellation_policy" class="ckeditor">{{old('cancellation_policy',isset($package->cancellation_policy)?$package->cancellation_policy : '')}}</textarea>
                                                                <label for="cancellation_policy" class="control-label">Cancellation Policy</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea name="payment_terms_policy" id="payment_terms_policy" class="ckeditor">{{old('payment_terms_policy',isset($package->payment_terms_policy)?$package->payment_terms_policy : '')}}</textarea>
                                                                <label for="payment_terms_policy" class="control-label">Payment Terms Policy</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end #tab4 -->
                                            </div>
                                            <!--end .tab-content -->
                                            <ul class="pager wizard">
                                                <li class="previous first"><a class="btn-raised"
                                                        href="javascript:void(0);">First</a></li>
                                                <li class="previous"><a class="btn-raised"
                                                        href="javascript:void(0);">Previous</a></li>
                                                <li class="next last"><a class="btn-raised"
                                                        href="javascript:void(0);">Last</a></li>
                                                <li class="next"><a class="btn-raised"
                                                        href="javascript:void(0);">Next</a></li>
                                            </ul>
                                    </div>
                                    <!--end #rootwizard -->
                                </div>
                                <!--end .card-body -->
                            </div>
                            <!--end .card -->
                        </div>
                        <!--end .col -->
                    </div>
                    <!--end .row -->
                    <!-- END VALIDATION FORM WIZARD -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="" data-spy="affix" data-offset-top="50">
            <div class="panel-group" id="accordion1">
                <div class="card panel expanded">
                    <div class="card-head" data-toggle="collapse" data-parent="#accordion1"
                        data-target="#accordion1-1">
                        <header>Publish</header>
                        <div class="tools">
                            <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                        </div>
                    </div>
                    <div id="accordion1-1" class="collapse in">
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <a class="btn btn-default btn-ink" href="{{ route('package.index') }}">
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
                                        {{ old('is_published', isset($package->is_published) ? $package->is_published : '') == '1' ? 'checked' : '' }}
                                        data-switchery />
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
                                        {{ old('is_featured', isset($package->is_featured) ? $package->is_featured : '') == '1' ? 'checked' : '' }}
                                        data-switchery />
                                </div>
                            </div>
                        </div>
                        <div class="card-head">
                            <div class="side-label">
                                <div class="label-head">
                                    <span>Trending</span>
                                </div>
                                <div class="label-body">
                                    <input type="checkbox" id="switch_demo_1" name="is_trending"
                                        {{ old('is_trending', isset($package->is_trending) ? $package->is_trending : '') == '1' ? 'checked' : '' }}
                                        data-switchery />
                                </div>
                            </div>
                        </div>
                        <div class="card-head">
                            <div class="side-label">
                                <div class="label-body">
                                    <label class="text-default-light">Featured Image(Optional)</label>
                                    @if(isset($package) && $package->image)
                                        <input type="file" name="image" class="dropify" id="input-file-events"
                                               data-default-file="{{ asset($package->thumbnail_path)}}"/>
        
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
            <!--end .panel-group -->
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#category_dropdown').on('change', function(e) {
                e.preventDefault();
                var category_id = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: "{{ route('albums.get_sub_category') }}",
                    data: {
                        'category_id': category_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response.message);
                        $('#sub_category_dropdown').html(
                            '<option value="">Choose sub category</option>');
                        $.each(response.message, function(key, value) {
                            $('#sub_category_dropdown').append('<option value="' + value
                                .id + '">' + value.name + '</option>')
                        });
                    }
                });
            });
        });

        var append = 1;

        $(document).on('click', '#additemrow', function() {

            var b = parseFloat($("#temp").val());
            b = b + 1;
            $("#temp").val(b);
            var temp = $("#temp").val();
            var tst = `<div class="form-group row d-flex align-items-end appended-row">
                            <div class="form-group col-sm-6">
                                <input type="number" name="day[]" id="day" class="form-control">
                                <label for="day" class="control-label p-2">Day #</label>
                            </div>
                            <div class="form-group col-sm-6">
                                                                <input type="text" name="title[]" id="title"
                                                                    class="form-control">
                                                                <label for="title" class="control-label">Title</label>
                                                            </div>   
                            <div class="col-sm-12">
                                <label for="descriprion" class="control-label p-2">Itinerary</label>
                                <textarea name="description[${append}]" id="description" class="ckeditor p-2"></textarea>
                            </div>
                                                
                            <div class="col-md-1" style="margin-top: 45px;">
                                <input class="removeitemrow btn btn-sm btn-danger mr-1" type="button" value="Remove row">
                            </div>
                                                
                    </div>`;

            $('#additernary').append(tst);
            CKEDITOR.replace(`description[${append}]`);
            append++;       
            // selectRefresh();
        });

        $(document).on('click', '.removeitemrow', function() {
            $(this).closest('.appended-row').remove();
            
        })

        function remove_product(o) {
            var p = o.parentNode.parentNode;
            p.parentNode.removeChild(p);
        }

        function remove_productforedit(o) {
            var p = o.parentNode.parentNode;
            p.parentNode.removeChild(p);
        }
    </script>
    <script>
        $(document).ready(function()
        {
            $(document).on('click', '#addimagerow', function() {

                var b = parseFloat($("#temp").val());
                b = b + 1;
                $("#temp").val(b);
                var temp = $("#temp").val();
                var tst = `<div class="form-group row d-flex align-items-end appended-image-row">
                                                            <div class="form-group col-sm-10">
                                                                <input type="file" name="images[]" id="images" class="form-control dropify">
                                                                <label for="image" class="control-label">Featured Image</label>
                                                            </div>

                                                            <div class="col-md-2" style="margin-top: 45px;">
                                                                <input class="removeimagerow btn btn-sm btn-danger mr-1" type="button" value="Remove row">
                                                            </div>

                                                        </div>`;

            $('#addimage').append(tst);
            $('.dropify').dropify();

            });

            $(document).on('click', '.removeimagerow', function() {
            $(this).closest('.appended-image-row').remove();

            })

            function remove_product(o) {
            var p = o.parentNode.parentNode;
            p.parentNode.removeChild(p);
            }

            function remove_productforedit(o) {
            var p = o.parentNode.parentNode;
            p.parentNode.removeChild(p);
            }
        });
    </script>
@endpush
@section('scripts')
    <script src="{{ asset('resources/assets/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('resources/assets/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endsection
