@extends('layouts.member')
@section('pageTitle',$forumtopic->topic)

@section('innerTitle')
     {{ $forumtopic->topic }}
    <p><small>@lang('admin.by') {{ $forumtopic->user->name }} @lang('admin.on') {{ \Carbon\Carbon::parse($forumtopic->created_at)->format('D d/M/Y') }}</small></p>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/member/forum-topics') }}">@lang('admin.forum-topics')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.topic')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">




        <div class="container-fluid">
            <a class="btn btn-primary  pull-right" href="{{ url('/member/forum-topics/' . $forumtopic->id . '/edit') }}">@lang('admin.reply')</a>



            <div class="" style="clear: both; padding-top: 20px">
            @foreach($threads as $thread)

                    <div class="panel panel-default" style="margin-bottom: 30px" >
                        <div class="panel-heading">@lang('admin.by') {{ $thread->user->name }} @lang('admin.on') {{ \Carbon\Carbon::parse($thread->created_at)->format('D d/M/Y') }}</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2" style="border-right: solid 1px #CCCCCC">
                                    @if(!empty($thread->user->picture))
                                        <img src="{{ asset($thread->user->picture) }}" class="img-responsive img-circle m-b"  />
                                    @else
                                        <img src="{{ avatar($thread->user->gender) }}" class="img-responsive img-circle m-b"  />
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <div>
                                        {!! clean($thread->content) !!}
                                    </div>

                                    @if($thread->forumAttachments()->count()>0)
                                        <div class="well" style="margin-top: 40px">
                                            <div class="border-bottom border-left border-right bg-white mg-tb-15">
                                                <p class="m-b-md">
                                                    <span><i class="fa fa-paperclip"></i> {{ $thread->forumAttachments()->count() }} @if($thread->forumAttachments()->count()>1) @lang('admin.attachments') @else @lang('admin.attachment') @endif - </span>
                                                    <a href="{{ route('member.forum.download-attachments',['forumThread'=>$thread->id]) }}" class="btn btn-default btn-xs">@lang('admin.download-all') <i class="fa fa-file-zip-o"></i> </a>
                                                </p>

                                                <div>
                                                    <div class="row">
                                                        @foreach($thread->forumAttachments as $attachment)
                                                            <a href="{{ route('member.forum.download-attachment',['forumAttachment'=>$attachment->id]) }}">
                                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                    <div class="hpanel vw-mb">
                                                                        <div class="panel-body file-body incon-ctn-view" >
                                                                            @if(isImage($attachment->file_path))
                                                                                <img style="max-height: 270px" src="{{ route('member.forum.view-image',['downloadFile'=>$attachment->id]) }}" class="img-responsive img-center" alt=""/>
                                                                            @else
                                                                                <i class="fa fa-file text-info"></i>
                                                                            @endif
                                                                        </div>
                                                                        <div class="panel-footer ft-pn">
                                                                            {{ basename($attachment->file_path) }}
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </a>
                                                        @endforeach


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            
                        </div>
                    </div>

                @endforeach

            </div>
        </div>

        <div class="container-fluid" style="margin-top: 20px">
            <div class="product-payment-inner-st form-content">
                <div class="row">
                    <div class="col-md-6">
                        {{ $threads->links() }}
                    </div>
                    <div class="col-md-6"><a class="btn btn-primary   pull-right" href="{{ url('/member/forum-topics/' . $forumtopic->id . '/edit') }}">@lang('admin.reply')</a></div>
                </div>

            </div>
        </div>

    </div>
@endsection