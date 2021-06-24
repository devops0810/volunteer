@extends('layouts.member')
@section('pageTitle',__('admin.inbox'))

@section('innerTitle')
    @lang('admin.view') @lang('admin.message')
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ route('member.emails.inbox') }}">@lang('admin.inbox')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.view') @lang('admin.message')</span>
    </li>
@endsection

@section('content')

    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">

                <div class="hpanel email-compose mailbox-view">
                    <div id="mailContent">

                        <div class="panel-heading hbuilt">

                            <div class="p-xs h4">
                                <small class="pull-right view-hd-ml">
                                    {{ \Illuminate\Support\Carbon::parse($email->created_at)->diffForHumans() }}
                                </small> {{ $email->subject }}

                            </div>
                        </div>
                        <div class="border-top border-left border-right bg-light">
                            <div class="p-m custom-address-mailbox">

                                @if(!empty($email->comment))
                                    <div>
                                        <span class="font-extra-bold">@lang('admin.comment'): </span> {{ $email->comment }}
                                    </div>
                                @endif
                                <div>
                                    <span class="font-extra-bold">@lang('admin.from'): </span>
                                    <a href="#">{{ $email->user->email }}</a>
                                </div>
                                <div>
                                    <span class="font-extra-bold">@lang('admin.date'): </span> {{ \Illuminate\Support\Carbon::parse($email->created_at)->format('d.M.Y') }}
                                </div>
                            </div>
                        </div>
                        <div class="panel-body panel-csm">
                            <div>
                                {!! clean($email->message) !!}
                            </div>
                        </div>
                    </div>

                    @if($email->emailAttachments()->count()>0)
                        <div class="border-bottom border-left border-right bg-white mg-tb-15">
                            <p class="m-b-md">
                                <span><i class="fa fa-paperclip"></i> {{ $email->emailAttachments()->count() }} @if($email->emailAttachments()->count()>1) @lang('admin.attachments') @else @lang('admin.attachment') @endif - </span>
                                <a href="{{ route('member.email.download-attachments',['email'=>$email->id]) }}" class="btn btn-default btn-xs">@lang('admin.download-all') <i class="fa fa-file-zip-o"></i> </a>
                            </p>

                            <div>
                                <div class="row">
                                    @foreach($email->emailAttachments as $attachment)
                                        <a href="{{ route('member.email.download-attachment',['emailAttachment'=>$attachment->id]) }}">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                <div class="hpanel vw-mb">
                                                    <div class="panel-body file-body incon-ctn-view" >
                                                        @if(isImage($attachment->file_path))
                                                            <img style="max-height: 270px" src="{{ route('member.email.view-image',['emailAttachment'=>$attachment->id]) }}" class="img-responsive img-center" alt=""/>
                                                        @else
                                                            <i class="fa fa-file text-info"></i>
                                                        @endif
                                                    </div>
                                                    <div class="panel-footer ft-pn">
                                                        {{ $attachment->file_name }}
                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                    @endforeach


                                </div>

                            </div>
                        </div>
                    @endif



                    <div class="panel-footer text-right ft-pn">
                        <div class="btn-group active-hook">
                            <a href="{{ url('member/emails/create') }}?reply={{ $email->id }}" class="btn btn-default"><i class="fa fa-reply"></i> @lang('admin.reply')</a>
                            <button onclick="printPageArea('mailContent')" class="btn btn-default"><i class="fa fa-print"></i> @lang('admin.print')</button>

                            <a onclick="return confirm('@lang('admin.delete-prompt')')"  class="btn btn-default" href="{{ route('member.email.delete-inbox',['id'=>$email->id]) }}"><i class="fa fa-trash-o"></i> @lang('admin.delete')</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection