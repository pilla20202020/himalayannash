@extends('backend.layouts.admin.admin')

@section('title', 'Package Inquiry')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all inquiries</header>
                    <div class="tools">

                        <a class="btn btn-primary ink-reaction" href="{{route('inquiry.index')}}">
                            <i class="md md-keyboard-backspace"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="example" class="table table-bordered table-hover display">
                        <tbody>
                            <tr>
                                <th>First Name</th>
                                <td>{{$inquiry->first_name}}</td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td>{{$inquiry->last_name}}</td>
                            </tr>
                            <tr>
                                <th>For Package</th>
                                <td>{{$inquiry->package->name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$inquiry->email}}</td>
                            </tr>
                            <tr>
                                <th>Contact No.</th>
                                <td>{{$inquiry->contact_no}}</td>
                            </tr>
                            <tr>
                                <th>Message</th>
                                <td>{!!$inquiry->message!!}</td>
                            </tr>
                            <tr>
                                <th>Inquiry Date</th>
                                <td>{{$inquiry->created_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop

