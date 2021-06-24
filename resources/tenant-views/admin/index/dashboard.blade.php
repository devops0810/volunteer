@extends('layouts.admin')
@section('pageTitle',__('admin.admin-dashboard'))
@section('innerTitle',__('admin.admin-dashboard'))

@section('content')

    <div class="analytics-sparkle-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <a href="{{ url('admin/departments') }}">
                    <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                        <h3 class="box-title">@lang('admin.departments')</h3>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <i class="fa fa-users"></i>
                                <div id="sparklinedash_"></div>
                            </li>
                            <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success">{{ $departments }}</span></li>
                        </ul>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <a href="{{ url('admin/members') }}">
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">@lang('admin.members')</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <i class="fa fa-user"></i>
                                    <div id="sparklinedash_"></div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success">{{ $members }}</span></li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <a href="{{ url('admin/admins') }}">
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">@lang('admin.administrators')</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <i class="fa fa-user-secret"></i>
                                    <div id="sparklinedash_"></div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success">{{ $admins }}</span></li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <a href="{{ url('admin/emails') }}">
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">@lang('admin.messages')</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <div id="sparklinedash_"></div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success">{{ $messages }}</span></li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="product-sales-area mg-tb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-sales-chart">
                        <div class="portlet-title">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="caption pro-sl-hd">
                                        <span class="caption-subject"><b>@lang('admin.new-members')</b></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="actions graph-rp graph-rp-dl">
                                        <p><a href="{{ url('admin/members') }}">@lang('admin.view-all')</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            @foreach($newMembers as $item)
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="student-inner-std res-mg-b-30">
                                        <div class="student-img imgv-box" style="height: 259px; overflow: hidden">
                                            @if(!empty($item->picture))
                                                <img src="{{ asset($item->picture) }}" class="img-responsive imgv" />
                                            @else
                                                <img src="{{ avatar($item->gender) }}" class="img-responsive imgv"   />
                                            @endif
                                        </div>
                                        <div class="student-dtl">

                                            <h2>
                                                <div  class="i-checks " >
                                                    <label> {{ $item->name }}


                                                    </label>
                                                </div>
                                            </h2>

                                            <p class="dp">{{ gender($item->gender) }}</p>
                                            <p class="dp-ag">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-cogs" aria-hidden="true"></i>    @lang('admin.actions') <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">

                                                    <li><a href="{{ url('/admin/members/' . $item->id) }}">@lang('admin.details')</a></li>
                                                    <li> <a href="{{ url('/admin/members/' . $item->id . '/edit') }}" title="@lang('site.edit') @lang('admin.member')"> @lang('site.edit')</a></li>
                                                    <li><a href="{{ url('admin/emails/create') }}?user={{ $item->id }}">@lang('admin.email')</a></li>
                                                    <li> <a href="{{ url('admin/sms/create') }}?user={{ $item->id }}" >@lang('admin.sms')</a></li>
                                                </ul>
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-sales-area mg-tb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-sales-chart">
                        <div class="portlet-title">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="caption pro-sl-hd">
                                        <span class="caption-subject"><b>@lang('admin.recent-messages')</b></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="actions graph-rp graph-rp-dl">
                                        <p><a href="{{ url('admin/emails') }}">@lang('admin.view-all')</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="table-responsive ib-tb">
                            <table class="table table-hover table-mailbox">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>@lang('admin.sender')</th>
                                    <th>@lang('admin.subject')</th>
                                    <th ></th>
                                    <th class="text-right mail-date" style="padding-right: 80px">@lang('admin.date')</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($emails as $item)

                                    <tr @if($item->pivot->read==0) class="unread" @endif >
                                        <td >
                                            <div class="checkbox">
                                                <input name="{{ $item->id }}" value="{{ $item->id }}" type="checkbox" style="margin-left: 0px;">
                                                <label></label>
                                            </div>
                                        </td>
                                        <td onclick="document.location.replace('{{ route('email.view-inbox',['email'=>$item->id]) }}')" class="clickable truncate">
                                            <a href="{{ route('email.view-inbox',['email'=>$item->id]) }}" style="width: 100%; height: 100%">

                                                <div>
                                                    {{ $item->user->name }}

                                                </div>
                                            </a>
                                        </td>
                                        <td  onclick="document.location.replace('{{ route('email.view-inbox',['email'=>$item->id]) }}')"  class="clickable"><a  style="width: 100%; height: 100%" href="{{ route('email.view-inbox',['email'=>$item->id]) }}">{{ $item->subject }}</a>
                                        </td>
                                        <td  onclick="document.location.replace('{{ route('email.view-inbox',['email'=>$item->id]) }}')"  class="clickable">
                                            <a  style="width: 100%; height: 100%" href="{{ route('email.view-inbox',['email'=>$item->id]) }}">
                                                @if($item->emailAttachments()->count()>0)
                                                    <i class="fa fa-paperclip"></i>
                                                @endif
                                            </a>
                                        </td>
                                        <td  onclick="document.location.replace('{{ route('email.view-inbox',['email'=>$item->id]) }}')"  class="clickable text-right mail-date">{{ \Illuminate\Support\Carbon::parse($item->crated_at)->format('D, M d, Y') }}</td>
                                        <td>
                                            <a  href="{{ route('email.delete-inbox',['email'=>$item->id]) }}"  title="@lang('site.delete')" onclick="return confirm('@lang('admin.delete-prompt')')" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>


                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection