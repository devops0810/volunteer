@extends('layouts.member')
@section('pageTitle','Events')

@section('innerTitle')
     @lang('admin.event') : {{ $event->name }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/member/events') }}">@lang('admin.events')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.event')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <div class="card">
                <div class="card-body">

                    <a href="{{ url('/member/events') }}" title="@lang('admin.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('admin.back')</button></a>
                    <a href="{{ url('/member/events/' . $event->id . '/edit') }}" title="@lang('admin.edit') event"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('admin.edit')</button></a>

                    <form method="POST" action="{{ url('member/events' . '/' . $event->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="@lang('admin.delete') event" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.delete')</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>@lang('admin.date')</th><td>{{ \Illuminate\Support\Carbon::parse($event->event_date)->format('d/M/Y') }}</td>
                            </tr>
                            <tr><th> @lang('admin.name') </th><td> {{ $event->name }} </td></tr><tr><th> @lang('admin.venue') </th><td> {{ $event->venue }} </td></tr><tr><th> @lang('admin.description') </th><td> {!! clean( nl2br(clean($event->description))) !!} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


            </div>
        </div>


    </div>
@endsection