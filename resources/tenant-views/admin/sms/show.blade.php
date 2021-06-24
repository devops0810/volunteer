@extends('layouts.admin')
@section('pageTitle',__('admin.view').' '.__('admin.sms'))

@section('innerTitle')
    @lang('admin.view') @lang('admin.sms')
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/admin/sms') }}">@lang('admin.sent-sms')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.view') @lang('admin.sms')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">@lang('admin.message')</a></li>
                            <li><a href="#reviews"> @lang('admin.recipients'): @lang('admin.members') ({{ $sms->users()->count() }})</a></li>
                            <li><a href="#INFORMATION">@lang('admin.recipients'): @lang('admin.departments') ({{ $sms->departments()->count() }})</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="hpanel email-compose mailbox-view">
                                            <div id="mailContent">

                                                <div class="panel-heading hbuilt">

                                                    <div class="p-xs h4">
                                                        <small class="pull-right view-hd-ml">
                                                            {{ \Illuminate\Support\Carbon::parse($sms->created_at)->diffForHumans() }}
                                                        </small>

                                                    </div>
                                                </div>
                                                <div class="border-top border-left border-right bg-light">
                                                    <div class="p-m custom-address-mailbox">

                                                        @if(!empty($sms->comment))
                                                            <div>
                                                                <span class="font-extra-bold">@lang('admin.comment'): </span> {{ $sms->comment }}
                                                            </div>
                                                        @endif

                                                        <div>
                                                            <span class="font-extra-bold">@lang('admin.date'): </span> {{ \Illuminate\Support\Carbon::parse($sms->created_at)->format('d.M.Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body panel-csm">
                                                    <div>
                                                        {!! clean( nl2br($sms->message)) !!}
                                                    </div>
                                                </div>
                                            </div>





                                            <div class="panel-footer text-right ft-pn">
                                                <div class="btn-group active-hook">
                                                    <button onclick="printPageArea('mailContent')" class="btn btn-default"><i class="fa fa-print"></i> @lang('admin.print')</button>

                                                    <a onclick="return confirm('@lang('admin.delete-prompt')')"  class="btn btn-default" href="{{ route('sms.delete',['id'=>$sms->id]) }}"><i class="fa fa-trash-o"></i> @lang('admin.delete')</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="product-tab-list tab-pane fade" id="reviews">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <table style="width: 100%;" class="table" id="recipients">
                                                        <thead>
                                                        <tr>
                                                            <td>@lang('admin.name')</td>
                                                            <td>@lang('admin.telephone')</td>
                                                            <td>@lang('admin.departments')</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($sms->users()->orderBy('name')->limit(1000)->get() as $user)
                                                            <tr>
                                                                <td>{{ $user->name }}</td>
                                                                <td>{{ $user->telephone }}</td>
                                                                <td>
                                                                    <ul class="comma-tags">
                                                                        @foreach($user->departments as $department)
                                                                            <li>{{ $department->name }}</li>
                                                                        @endforeach
                                                                    </ul>
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
                            <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <ul>
                                                        @foreach($sms->departments as $department)
                                                            <li>{{ $department->name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('header')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/media/css/jquery.dataTables.min.css') }}">
@endsection

@section('footer')
    <script type="text/javascript" src="{{ asset('vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(function(){
            $('#recipients').DataTable({
                language: {
                    search: "@lang('admin.search'):",
                    info: "@lang('admin.table-info')",
                    emptyTable: "@lang('admin.empty-table')",
                    lengthMenu:    "@lang('admin.table-length')",
                    paginate: {
                        first:      "@lang('admin.first')",
                        previous:   "@lang('admin.previous')",
                        next:       "@lang('admin.next')",
                        last:       "@lang('admin.last')"
                    }
                }
            });
        });
    </script>
@endsection