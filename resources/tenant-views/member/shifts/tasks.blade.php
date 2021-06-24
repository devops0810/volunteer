@extends('layouts.member')
@section('pageTitle',__('admin.tasks'))

@section('innerTitle')
    @lang('site.edit') @lang('admin.tasks'): {{ $shift->name }} ({{ $shift->event->name }})
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/member/events') }}">@lang('admin.events')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ route('member.shifts.index',['event'=>$shift->event->id]) }}">@lang('admin.shifts')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('site.edit') @lang('admin.tasks')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">

                <div>
                    <a href="{{ route('member.shifts.index',['event'=>$shift->event->id]) }}" title="@lang('admin.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('admin.back')</button></a>
                    <a href="{{ url('/member/shifts/' . $shift->id . '/edit') }}" title="@lang('admin.edit') @lang('admin.shift')"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('admin.edit') @lang('admin.shift')</button></a>

                </div>


                <form method="POST" action="{{ route('member.shifts.save-tasks',['shift'=>$shift->id]) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>@lang('admin.member')</th>
                            <th>@lang('admin.picture')</th>
                            <th>@lang('admin.tasks')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shift->users()->orderBy('name')->get() as $user)
                            <tr>
                                <td>{{ $user->name }} ({{ $user->email }})</td>
                                <td>
                                    @if(!empty($user->picture))
                                        <img src="{{ asset($user->picture) }}" class="img-responsive img-circle m-b" style="max-width: 200px"/>
                                    @else
                                        <img src="{{ avatar($user->gender) }}" class="img-responsive img-circle m-b"  style="max-width: 200px" />
                                    @endif
                                </td>
                                <td><textarea class="form-control" name="{{ $user->id }}" id="{{ $user->id }}" cols="30" rows="4">{{ $user->pivot->tasks }}</textarea></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary btn-block btn-lg">@lang('admin.save')</button>
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