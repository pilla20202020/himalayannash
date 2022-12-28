<div class="footer-main border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6">
                <h6>Get In Touch</h6>
                <ul class="list-unstyled mb-0">
                    @if(setting('address'))
                    <li>
                        <a href="#"><i class="fa fa-home mr-3 text-secondary"></i>{{setting('address')}}</a>
                    </li>
                    @endif
                    @if(setting('email'))
                    <li>
                        <a href="mailto:{{setting('email')}}"><i class="fa fa-envelope mr-3 text-secondary fs-12"></i>
                            {{setting('email')}}</a>
                    </li>
                    @endif
                    @if(setting('phone'))
                    <li>
                        <a href="tel:{{setting('phone_alternate')}}"><i class="fa fa-phone mr-3 text-secondary"></i>{{setting('phone')}}</a>
                    </li>
                    @endif
                    @if(setting('phone_alternate'))
                    <li>
                        <a href="tel:{{setting('phone_alternate')}}"><i class="fa fa-print mr-3 text-secondary"></i>{{setting('phone_alternate')}}</a>
                    </li>
                    @endif
                </ul>
            </div>
            {{-- <div class="col-xl-3 col-lg-3 col-md-6">
                <h6>Popular Tours</h6>
                @if($footer_tours->isNotEmpty())
                <ul class="list-unstyled mb-0">
                    @foreach ($footer_tours as $tour)
                        <li><a href="{{route('package_details',$tour->slug)}}"><i class="fa fa-angle-double-right mr-2 text-secondary"></i>{{$tour->name}}</a></li>
                    @endforeach
                </ul>
                @else
                <ul class="list-unstyled mb-0">
                    No popular tours at the moment.
                </ul>
                @endif
            </div> --}}
            <div class="col-xl-2 col-lg-3 col-md-6">
                <h6>Useful Links</h6>
                <ul class="list-unstyled mb-0">
                    <li><a href="{{route('all_tours')}}"><i
                                class="fa fa-angle-double-right mr-2 text-secondary"></i>Book Tours</a></li>
                    <li><a href="{{route('plan_trips')}}"><i class="fa fa-angle-double-right mr-2 text-secondary"></i>Plan a trip</a>
                                </li>
                    <li><a href="{{route('blogs')}}"><i class="fa fa-angle-double-right mr-2 text-secondary"></i>Recent
                            Blogs</a></li>
                    <li><a href="faq.html"><i class="fa fa-angle-double-right mr-2 text-secondary"></i>How it Works</a>
                    </li>
                    <li><a href="faq.html"><i class="fa fa-angle-double-right mr-2 text-secondary"></i>FAQ</a></li>
                </ul>
            </div>
            <div class="col-xl-4 col-lg-3 col-md-6">
                <h6 class="mb-2">Follow Us</h6>
                <ul class="social-icons social-icons-footer mb-0 mt-3">
                    @if(setting('facebook'))
                    <li>
                        <a class="social-icon" href="{{setting('facebook')}}" target="__blank"><i class="fa fa-facebook text-white-50"></i></a>
                    </li>
                    @endif
                    @if(setting('twitter'))
                    <li>
                        <a class="social-icon" href="{{setting('twitter')}}" target="__blank"><i class="fa fa-twitter text-white-50"></i></a>
                    </li>
                    @endif
                    @if(setting('linkedin'))
                    <li>
                        <a class="social-icon" href="{{setting('linkedin')}}" target="__blank"><i class="fa fa-linkedin text-white-50"></i></a>
                    </li>
                    @endif
                    @if(setting('instagram'))
                    <li>
                        <a class="social-icon" href="{{setting('instagram')}}" target="__blank"><i class="fa fa-instagram text-white-50"></i></a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="bg-primary text-white-50 p-3">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-12 col-sm-12  mt-2 mb-2 text-center text-white">
                Copyright © 2022 <a href="https://accessworld.net/" class="fs-14 text-white">Access World
                    Tech</a>. All rights reserved.
            </div>
        </div>
    </div>
</div>