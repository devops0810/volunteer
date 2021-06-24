@extends('layouts.member')
@section('pageTitle',__('admin.shifts'))

@section('innerTitle')
    @lang('site.create-new') @lang('admin.shift'): {{ $event->name }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/member/events') }}">@lang('admin.events')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ route('member.shifts.index',['event'=>$event->id]) }}">@lang('admin.shifts')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('site.create-new') @lang('admin.shift')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <form method="POST" action="{{ route('member.shifts.store',['event'=>$event->id]) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                @include ('member.shifts.form', ['formMode' => 'create'])

            </form>




            </div>
        </div>


    </div>

@endsection


@section('header')
    <link href="{{ asset('vendor/pickadate/themes/default.date.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pickadate/themes/default.time.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pickadate/themes/default.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">

@endsection


@section('footer')
    <script src="{{ asset('vendor/pickadate/picker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/picker.date.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/picker.time.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/legacy.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $('.select2').select2();
        });
    </script>
    <script type="text/javascript">
        $('.time').pickatime({
            formatSubmit: 'HH:i',
            hiddenName: true,
            interval: 15
        });
    </script>
@endsection