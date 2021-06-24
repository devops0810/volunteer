@extends('layouts.member')
@section('pageTitle',__('admin.shifts').': '.$event->name)

@section('innerTitle')
    @lang('admin.shifts'): {{ $event->name }}

@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('member/events') }}">@lang('admin.events')</a> <span class="bread-slash">/</span></li>
    <li><span class="bread-blod">@lang('admin.shifts')</span>
    </li>
@endsection

@section('content')
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">

                        <div class="add-product">
                            <a  title="@lang('site.create-new') shift" href="{{ route('member.shifts.create',['event'=>$event->id]) }}"><i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')</a>
                        </div>
                        <div class="asset-inner">
                            <table class="table">
                                <thead>
                                <tr>
                                  <th>@lang('admin.name')</th><th>@lang('admin.starts')</th><th>@lang('admin.ends')</th>
                                    <th>@lang('admin.members')</th>
                                    <th>@lang('site.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($shifts as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td><td>{{ \Illuminate\Support\Carbon::parse($item->starts)->format('h:i A') }}</td><td>{{ \Illuminate\Support\Carbon::parse($item->ends)->format('h:i A') }}</td>
                                        <td>{{ $item->users()->count() }}</td>
                                        <td>
                                            <a href="{{ url('/member/shifts/' . $item->id) }}" title="@lang('site.view') shift"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> @lang('site.view')</button></a>
                                            <a href="{{ route('member.shifts.tasks',['shift'=>$item->id]) }}"  ><button class="btn btn-success btn-sm"><i class="fa fa-list-alt" aria-hidden="true"></i> @lang('admin.manage') @lang('admin.tasks')</button></a>
                                            <a href="{{ url('/member/shifts/' . $item->id . '/edit') }}" title="@lang('site.edit') shift"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('site.edit')</button></a>

                                            <form method="POST" action="{{ url('/member/shifts' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="@lang('site.delete') shift" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('site.delete')</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="custom-pagination">
                            {!! clean( $shifts->appends(['search' => Request::get('search')])->render()) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection