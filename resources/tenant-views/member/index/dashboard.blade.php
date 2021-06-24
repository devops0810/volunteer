@extends('layouts.member')
@section('pageTitle',__('admin.dashboard'))
@section('innerTitle',__('admin.dashboard'))

@section('content')

    <div class="analytics-sparkle-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <a href="{{ route('member.events.roster') }}">
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">@lang('admin.upcoming-events')</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <i class="fa fa-calendar"></i>
                                    <div id="sparklinedash_"></div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success">{{ $totalEvents }}</span></li>
                            </ul>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    @can('dept_allows','show_members')
                    <a href="{{ url('member/members') }}">
                        @endcan
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
                        @can('dept_allows','show_members')
                    </a>
                    @endcan
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <a href="{{ route('member.emails.inbox') }}">
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
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <a href="{{ url('member/announcements') }}">
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">@lang('admin.announcements')</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <div id="sparklinedash_"></div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success">{{ $totalAnnouncements }}</span></li>
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
                <div class="col-md-6">
                    <div class="product-sales-chart">
                        <div class="portlet-title">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="caption pro-sl-hd">
                                        <span class="caption-subject"><b>@lang('admin.roster')</b></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="actions graph-rp graph-rp-dl">
                                        <p><a href="{{ route('member.events.roster') }}">@lang('admin.view-all')</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home1" aria-controls="home1" role="tab" data-toggle="tab">@lang('admin.upcoming-events')</a></li>
                                <li role="presentation"><a href="#profile1" aria-controls="profile1" role="tab" data-toggle="tab">@lang('admin.my-shifts')</a></li>
                               </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home1">
                                    <div class="white-box">
                                        <ul class="basic-list">
                                            @foreach($events as $event)
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-8">{{ $event->name }} ({{ \Carbon\Carbon::parse($event->event_date)->diffForHumans() }})</div>
                                                    <div class="col-md-4"><span class="pull-right label-purple label-7 label">{{ \Carbon\Carbon::parse($event->event_date)->format('D d/M/Y') }}</span></div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>



                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile1">
                                    <div class="white-box">
                                        <ul class="basic-list">
                                            @foreach($shifts as $shift)
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-8">{{ $shift->event->name }} ({{ \Carbon\Carbon::parse($event->event_date)->format('D d/M/Y') }})</div>
                                                        <div class="col-md-4"><span class="pull-right label-purple label-7 label">{{ \Illuminate\Support\Carbon::parse($shift->starts)->format('h:i A') }} @lang('admin.to') {{ \Illuminate\Support\Carbon::parse($shift->ends)->format('h:i A') }}</span></div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-sales-chart">
                        <div class="portlet-title">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="caption pro-sl-hd">
                                        <span class="caption-subject"><b>@lang('admin.announcements')</b></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="actions graph-rp graph-rp-dl">
                                        <p><a href="{{ url('member/announcements') }}">@lang('admin.view-all')</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="single-review-st-item res-mg-t-30 table-mg-t-pro-n">
                            @foreach($announcements as $item)
                            <div class="single-review-st-text">
                                @if(!empty($item->user->picture))
                                    <img src="{{ asset($item->user->picture) }}" />
                                @else
                                    <img src="{{ avatar($item->user->gender) }}" />
                                @endif
                                
                                <div class="review-ctn-hf">
                                    <h3>{{ $item->user->name }}</h3>
                                    <p><a href="{{ url('/member/announcements/' . $item->id) }}">{{ $item->title }}</a></p>
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
                <div class="col-md-8">
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
                                        <td onclick="document.location.replace('{{ route('member.email.view-inbox',['email'=>$item->id]) }}')" class="clickable truncate">
                                            <a href="{{ route('member.email.view-inbox',['email'=>$item->id]) }}" style="width: 100%; height: 100%">

                                                <div>
                                                    {{ $item->user->name }}

                                                </div>
                                            </a>
                                        </td>
                                        <td  onclick="document.location.replace('{{ route('member.email.view-inbox',['email'=>$item->id]) }}')"  class="clickable"><a  style="width: 100%; height: 100%" href="{{ route('member.email.view-inbox',['email'=>$item->id]) }}">{{ $item->subject }}</a>
                                        </td>
                                        <td  onclick="document.location.replace('{{ route('member.email.view-inbox',['email'=>$item->id]) }}')"  class="clickable">
                                            <a  style="width: 100%; height: 100%" href="{{ route('member.email.view-inbox',['email'=>$item->id]) }}">
                                                @if($item->emailAttachments()->count()>0)
                                                    <i class="fa fa-paperclip"></i>
                                                @endif
                                            </a>
                                        </td>
                                        <td  onclick="document.location.replace('{{ route('member.email.view-inbox',['email'=>$item->id]) }}')"  class="clickable text-right mail-date">{{ \Illuminate\Support\Carbon::parse($item->crated_at)->format('D, M d, Y') }}</td>
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
                <div class="col-md-4">
                    <div class="product-sales-chart">
                        <div class="portlet-title">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="caption pro-sl-hd">
                                        <span class="caption-subject"><b>@lang('admin.forum-topics')</b></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="actions graph-rp graph-rp-dl">
                                        <p><a href="{{ url('member/forum-topics') }}">@lang('admin.view-all')</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="single-review-st-item res-mg-t-30 table-mg-t-pro-n">
                            @foreach($forumTopics as $item)
                                <div class="single-review-st-text">
                                    @if(!empty($item->user->picture))
                                        <img src="{{ asset($item->user->picture) }}" />
                                    @else
                                        <img src="{{ avatar($item->user->gender) }}" />
                                    @endif

                                    <div class="review-ctn-hf">
                                        <h3>{{ $item->user->name }}<span class="pull-right label-purple label-7 label">{{ \Carbon\Carbon::parse($item->created_at)->format('D d/M/Y') }}</span></h3>
                                        <p><a href="{{ url('/member/announcements/' . $item->id) }}">{{ $item->topic }} ({{ $item->forumThreads()->count() -1 }} {{ strtolower(__('admin.replies')) }})</a></p>
                                    </div>

                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection