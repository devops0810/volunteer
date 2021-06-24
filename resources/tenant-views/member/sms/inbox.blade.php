@extends('layouts.member')
@section('pageTitle',__('admin.sms-inbox'))
@section('innerTitle')
    @lang('admin.sms-inbox')       @if(Request::get('search'))
        : {{ Request::get('search') }}
    @endif
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.sms-inbox')</span>
    </li>
@endsection

@section('content')
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hpanel">

                        <form  method="GET" action="{{ route('member.sms.inbox') }}" >
                            <div class="panel-heading hbuilt mailbox-hd">
                                <div class="text-center p-xs font-normal">
                                    <div class="input-group">
                                        <input name="search" value="{{ request('search') }}" type="text" class="form-control input-sm" placeholder="@lang('admin.search-inbox')"> <span class="input-group-btn active-hook"> <button type="submit" class="btn btn-sm btn-default">@lang('admin.search')
                                            </button> </span></div>
                                </div>
                            </div>
                        </form>
                        <form id="msg-list" action="{{ route('member.sms.delete-multiple-inbox') }}" method="post">
                            @csrf
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-8">
                                        <div class="btn-group ib-btn-gp active-hook mail-btn-sd mg-b-15">
                                            <button type="button"  onclick="document.location.replace('{{ selfURL() }}')" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> @lang('admin.refresh')</button>
                                            <button onclick="return confirm('@lang('admin.delete-prompt')')" title="@lang('admin.delete')" type="submit" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                            <button  type="button" class="check btn btn-default btn-sm"><i class="fa fa-check"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-4 mailbox-pagination">
                                        <div class="btn-group ib-btn-gp active-hook mail-btn-sd mg-b-15">
                                            @if($sms->previousPageUrl() != null)
                                                <a href="{{ $sms->previousPageUrl() }}" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i></a>
                                            @endif

                                            @if($sms->nextPageUrl() != null)
                                                <a  href="{{ $sms->nextPageUrl() }}" class="btn btn-default btn-sm"><i class="fa fa-arrow-right"></i></a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive ib-tb">
                                    <table class="table table-hover table-mailbox">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>@lang('admin.sender')</th>
                                            <th>@lang('admin.message')</th>
                                            <th>@lang('admin.comment')</th>
                                            <th class="text-right mail-date" style="padding-right: 80px">@lang('admin.date')</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sms as $item)

                                            <tr >
                                                <td >
                                                    <div class="checkbox">
                                                        <input name="{{ $item->id }}" value="{{ $item->id }}" type="checkbox" style="margin-left: 0px;">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td  class="clickable truncate">
                                                    <a  style="width: 100%; height: 100%">

                                                        <div>
                                                               {{ $item->user->name }}

                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="clickable"><a  style="width: 100%; height: 100%">{!! clean( nl2br(clean($item->message))) !!}</a>
                                                </td>
                                                <td class="clickable">{{ $item->notes }}</td>
                                                <td class="clickable text-right mail-date">{{ \Illuminate\Support\Carbon::parse($item->crated_at)->format('D, M d, Y') }}</td>
                                                <td>
                                                    <a  href="{{ route('member.sms.delete-inbox',['sms'=>$item->id]) }}"  title="@lang('site.delete')" onclick="return confirm('@lang('admin.delete-prompt')')" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>


                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                        <div class="panel-footer ib-ml-ft">
                            {!! clean( $sms->appends(['search' => Request::get('search')])->render()) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('footer')
    <script>
        $(function(){

            $('.check:button').click(function(){
                var checked = !$(this).data('checked');
                $('#msg-list input:checkbox').prop('checked', checked);
                $(this).val(checked ? 'uncheck all' : 'check all' )
                $(this).data('checked', checked);
            });

            $("#checkBtn").change(function () {
                console.log('checking');
                $("#member-form input:checkbox").prop('checked', $(this).prop("checked"));
            });
        });
    </script>

@endsection