@extends('layouts.member')
@section('pageTitle',__('admin.downloads'))

@section('innerTitle')
     @lang('admin.download') : {{ $download->name }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/member/downloads') }}">@lang('admin.downloads')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.download')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <div class="card">
                <div class="card-body">

                    <a href="{{ url('/member/downloads') }}" title="@lang('admin.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('admin.back')</button></a>
                    @can('administer')
                    <a href="{{ url('/member/downloads/' . $download->id . '/edit') }}" title="@lang('admin.edit') download"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('admin.edit')</button></a>

                    <form method="POST" action="{{ url('member/downloads' . '/' . $download->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="@lang('admin.delete') download" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.delete')</button>
                    </form>
                    @endcan
                    <br/>
                    <br/>

                    <div >
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>@lang('admin.added-on')</th><td>{{ Carbon\Carbon::parse($download->created_at)->format('D d/M/Y') }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.created-by')</th>
                                <td>{{ $download->user->name }}</td>
                            </tr>
                            <tr><th> @lang('admin.name') </th><td> {{ $download->name }} </td></tr><tr><th> @lang('admin.description') </th><td> {!! clean( nl2br(clean($download->description))) !!} </td></tr>
                            <tr>
                                <td colspan="2">
                                    @if($download->downloadFiles()->count()>0)
                                        <div class="border-bottom border-left border-right bg-white mg-tb-15">
                                            <p class="m-b-md">
                                                <span><i class="fa fa-paperclip"></i> {{ $download->downloadFiles()->count() }} @if($download->downloadFiles()->count()>1) @lang('admin.attachments') @else @lang('admin.attachment') @endif - </span>
                                                <a href="{{ route('member.download.download-attachments',['download'=>$download->id]) }}" class="btn btn-default btn-xs">@lang('admin.download-all') <i class="fa fa-file-zip-o"></i> </a>
                                            </p>

                                            <div>
                                                <div class="row">
                                                    @foreach($download->downloadFiles as $attachment)
                                                        <a href="{{ route('member.download.download-attachment',['downloadFile'=>$attachment->id]) }}">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                <div class="hpanel vw-mb">
                                                                    <div class="panel-body file-body incon-ctn-view" >
                                                                        @if(isImage($attachment->file_path))
                                                                            <img style="max-height: 270px" src="{{ route('member.download.view-image',['downloadFile'=>$attachment->id]) }}" class="img-responsive img-center" alt=""/>
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
                                    @endif
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