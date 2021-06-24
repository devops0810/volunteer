@extends('layouts.member')
@section('pageTitle',__('admin.events'))

@section('titleForm')
    <form id="nav-search" method="GET" action="{{ url('/member/events') }}" role="search" class="sr-input-func">
        <input name="search" value="{{ request('search') }}" type="text" placeholder="{{ ucfirst(__('site.search')) }}..." class="search-int form-control">
        <a onClick="$('#nav-search').submit()" href="#"><i class="fa fa-search"></i></a>
    </form>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.events')</span>
    </li>
@endsection

@section('content')
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>@lang('admin.events')
                        @if(Request::get('search'))
                             : {{ Request::get('search') }}
                            @endif
                        </h4>
                        <div class="add-product">
                            <a  title="@lang('site.create-new') event" href="{{ url('/member/events/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')</a>
                        </div>
                        <div class="asset-inner">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>@lang('admin.event') @lang('admin.date')</th><th>@lang('admin.name')</th><th>@lang('admin.shifts')</th><th>@lang('admin.members')</th><th>@lang('admin.opt-outs')</th><th>@lang('site.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $item)
                                    <tr>
                                        <td>{{  \Illuminate\Support\Carbon::parse($item->event_date)->format('D d/M/Y') }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->shifts()->count() }}</td>
                                        <td>{{ $controller->getTotalUsers($item) }}</td>
                                        <td>{{ $item->rejections()->count() }} @if($item->rejections()->count() > 0) (<a href="#"  data-toggle="modal" data-target="#myModal{{ $item->id }}" >@lang('admin.view')</a>) @endif


                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $item->id }}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">@lang('admin.opt-outs'): {{ $item->name }}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>@lang('admin.member')</th>
                                                                    <th>@lang('admin.shift')</th>
                                                                    <th>@lang('admin.opt-out') @lang('admin.date')</th>

                                                                    <th>@lang('admin.reason')</th>
                                                                    <th></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @foreach($item->rejections as $rejection)
                                                                    <tr>
                                                                        <td>{{ $rejection->user->name }}</td>
                                                                        <td>
                                                                            {{ \Illuminate\Support\Carbon::parse($rejection->shift->starts)->format('h:i A') }} @lang('admin.to') {{ \Illuminate\Support\Carbon::parse($rejection->shift->ends)->format('h:i A') }} ({{ $rejection->shift->name }})
                                                                        </td>
                                                                        <td>{{ \Carbon\Carbon::parse($rejection->created_at)->format('D d/m/Y') }}</td>
                                                                        <td>{{ $rejection->message }}</td>
                                                                        <td>
                                                                            <a target="_blank" href="{{ url('/member/shifts/' . $rejection->shift->id . '/edit') }}" title="@lang('site.edit') shift"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('site.edit') @lang('admin.shift')</button></a>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                                </tbody>



                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </td>
                                        <td>
                                            <a href="{{ route('member.shifts.index',['event'=>$item->id]) }}" ><button class="btn btn-success btn-sm"><i class="fa fa-clock-o" aria-hidden="true"></i> @lang('admin.manage-shifts')</button></a>

                                            <a href="{{ url('/member/events/' . $item->id) }}" title="@lang('site.view') event"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> @lang('site.view')</button></a>
                                            <a href="{{ url('/member/events/' . $item->id . '/edit') }}" title="@lang('site.edit') event"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('site.edit')</button></a>

                                            <form method="POST" action="{{ url('/member/events' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="@lang('site.delete') event" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('site.delete')</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="custom-pagination">
                            {!! clean( $events->appends(['search' => Request::get('search')])->render()) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection