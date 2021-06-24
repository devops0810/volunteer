@extends('layouts.member')
@section('pageTitle',__('admin.shift').' '.$shift->name)

@section('innerTitle')
     @lang('admin.shift'): {{ $shift->name }} ({{ $shift->event->name }})
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/member/events') }}">@lang('admin.events')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ route('member.shifts.index',['event'=>$shift->event->id]) }}">@lang('admin.shifts')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.shift')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <div class="card">
                <div class="card-body">

                    <a href="{{ route('member.shifts.index',['event'=>$shift->event->id]) }}" title="@lang('admin.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('admin.back')</button></a>
                    <a href="{{ url('/member/shifts/' . $shift->id . '/edit') }}" title="@lang('admin.edit') shift"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('admin.edit')</button></a>
                    <a href="{{ route('member.shifts.tasks',['shift'=>$shift->id]) }}"  ><button class="btn btn-success btn-sm"><i class="fa fa-list-alt" aria-hidden="true"></i> @lang('admin.manage') @lang('admin.tasks')</button></a>
                    <form method="POST" action="{{ url('member/shifts' . '/' . $shift->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="@lang('admin.delete') shift" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.delete')</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>@lang('admin.id')</th><td>{{ $shift->id }}</td>
                            </tr>
                            <tr><th> @lang('admin.name') </th><td> {{ $shift->name }} </td></tr><tr><th> @lang('admin.starts') </th><td> {{ \Illuminate\Support\Carbon::parse($shift->starts)->format('h:i A') }} </td></tr><tr><th> @lang('admin.ends') </th><td> {{ \Illuminate\Support\Carbon::parse($shift->ends)->format('h:i A') }} </td></tr>
                            <tr>
                                <th>@lang('admin.members')</th>
                                <td>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>@lang('admin.name')/@lang('admin.email')</th>
                                            <th>@lang('admin.tasks')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($shift->users()->orderBy('name')->get() as $user)
                                            <tr>
                                                <td>{{ $user->name }} ({{ $user->email }})</td>
                                                <td>{{ $user->pivot->tasks }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


            </div>
        </div>


    </div>
@endsection