@extends('layouts.member')
@section('pageTitle',__('admin.import').' '.__('admin.members'))

@section('innerTitle')
    @lang('admin.import') @lang('admin.members')
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/member/members') }}">@lang('admin.members')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.import') @lang('admin.members')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


                <form method="POST" action="{{ route('member.members.save-import') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}



                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
                                <label for="file" class="control-label"> @lang('admin.file')</label>


                                <input class="form-control" name="file" type="file" id="file"   >
                                {!! clean( $errors->first('file', '<p class="help-block">:message</p>')) !!}
                            </div>

                        </div>
                        <div class="col-md-6" style="padding-top: 50px">
                            <a href="{{ asset('resources/sample_import.csv') }}">@lang('admin.sample-file')</a>
                        </div>

                    </div>




                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="@lang('admin.submit')">
                    </div>


                </form>




            </div>
        </div>


    </div>

@endsection

@section('header')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
@endsection


@section('footer')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script>
        $(function(){
            $('.select2').select2();
        });
    </script>
@endsection